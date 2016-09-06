<?php
namespace backend\controllers;

use backend\models\Calendar;
use backend\models\Clients;
use backend\models\Orders;
use backend\models\settings\Type;
use backend\models\spent\SpentRelation;
use backend\models\Stats;
use Yii;
use yii\base\Object;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class StatsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'profit', 'visits'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                                return (Yii::$app->user->identity->access > 50)? true : false;
                            }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex(){
        $model = new Stats();
        $model->load(Yii::$app->request->get());
        $data = $model->getData();
        $types = Type::find()->all();

        $minDate = Orders::find()->select('MIN(date) as date')->one();
        $maxDate = Orders::find()->select('MAX(date) as date')->one();

        $minDate = $minDate->date;
        $maxDate = $maxDate->date;
        
        $spent = SpentRelation::find()->orderBy('date')->all();


        //Новых клиентов

        $query = Calendar::find()
            ->select('*')
            ->where("DATE(`_date`) BETWEEN '".$minDate."' AND '".$maxDate."'")
            ->groupBy('YEAR(`_date`), MONTH(`_date`)')
            ->orderBy('_date');

        $subQuery = Clients::find()
            ->select('COUNT(*) as count, DATE(create_at) as create_at')
            ->groupBy('YEAR(`create_at`), MONTH(`create_at`)');

        $clients = $query->leftJoin(['AS `dd`' => $subQuery], 'YEAR(dd.create_at) = YEAR(calendar._date) AND MONTH(dd.create_at) = MONTH(calendar._date)')->asArray()->all();



        //Оборот по типам вещей

        foreach ($types as $type){

            $query = Calendar::find()
                ->select('*')
                ->where("`_date` BETWEEN '".$minDate."' AND '".$maxDate."'")
                ->groupBy('YEAR(`_date`), MONTH(`_date`)')
                ->orderBy('_date');
            $subQuery = Orders::find()
                ->select('SUM(costTotal) as sum, date')
                ->where(['typeId' => $type->id])
                ->groupBy('YEAR(`date`), MONTH(`date`)');


            $stats[] = [
                'label' => $type->label,
                'values' => $query->leftJoin(['AS `dd`' => $subQuery], 'YEAR(dd.date) = YEAR(calendar._date) AND MONTH(dd.date) = MONTH(calendar._date)')->asArray()->all()
            ];

        }

        //Повторные визиты

        foreach ($types as $type){

            $query = Calendar::find()
                ->select('*')
                ->where("`_date` BETWEEN '".$minDate."' AND '".$maxDate."'")
                ->groupBy('YEAR(`_date`), MONTH(`_date`)')
                ->orderBy('_date');

            $subQuery2 = Orders::find()
                ->select('COUNT(*) AS count, date, typeId')
                ->where(['typeId' => $type->id])
                ->groupBy('clientId, YEAR(`date`), MONTH(`date`)');

            $subQuery = Orders::find()
                ->select('COUNT(count) as count, date')
                ->from(['AS `sub`' => $subQuery2])
                ->andWhere(['>', 'count', '1'])
                ->groupBy('YEAR(`date`), MONTH(`date`)');

            $visits[] = [
                'label' => $type->label,
                'values' => $query->leftJoin(['AS `dd`' => $subQuery], 'YEAR(dd.date) = YEAR(calendar._date) AND MONTH(dd.date) = MONTH(calendar._date)')->asArray()->all()
            ];

        }

        return $this->render('index',[
            'model' => $model,
            'data' => $data,
            'stats' => $stats,
            'spent' => $spent,
            'monthArr' => Stats::getMonthArr(),
            'clients' => $clients,
            'visits' => $visits
        ]);
    }
}
