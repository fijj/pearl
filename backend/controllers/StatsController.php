<?php
namespace backend\controllers;

use backend\models\Calendar;
use backend\models\Orders;
use backend\models\settings\Type;
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
        foreach ($types as $type){
            $query = Calendar::find()->select('*')->where('`_date` BETWEEN \'2015-09-15\' AND \'2016-09-19\'')->groupBy('MONTH(`_date`)')->orderBy('_date');
            $subQuery = Orders::find()->select('*')->where(['typeId' => $type->id])->groupBy('MONTH(`date`)');


            $stats[] = [
                'label' => $type->label,
                'values' => $query->leftJoin(['AS `dd`' => $subQuery], 'dd.date = calendar._date')->all()
/**
                'point' => $point->label,
                'peopleToday' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = CURDATE()')->count(),
                'profitToday' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = CURDATE()')->sum('cost') * ((100 - $point->discount)/100),
                'peopleTomorrow' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = DATE_ADD(CURDATE(), INTERVAL -1 DAY)')->count(),
                'profitTomorrow' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = DATE_ADD(CURDATE(), INTERVAL -1 DAY)')->sum('cost') * ((100 - $point->discount)/100),
                'peopleThisMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(CURDATE())')->count(),
                'profitThisMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(CURDATE())')->sum('cost') * ((100 - $point->discount)/100),
                'peoplePrevMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(DATE_ADD(CURDATE(), INTERVAL -1 MONTH))')->count(),
                'profitPrevMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(DATE_ADD(CURDATE(), INTERVAL -1 MONTH))')->sum('cost') * ((100 - $point->discount)/100),
                'debt' => Orders::find()->where(['pointId' => $point->id])->sum('debt'),
 **/
            ];
        }
        var_dump($stats);
        return $this->render('index',[
            'model' => $model,
            'data' => $data,
            'stats' => $stats,
            'monthArr' => Stats::getMonthArr()
        ]);
    }
}
