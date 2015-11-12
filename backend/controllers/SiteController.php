<?php
namespace backend\controllers;

use backend\models\Orders;
use backend\models\settings\Point;
use backend\models\Tasks;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Clients;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
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

    public function actionIndex()
    {
        $clients = new Clients();
        $tasks = Tasks::find()->orderBy(['id' => SORT_DESC])->all();
        $points = Point::find()->all();
        foreach ($points as $point){
            $stats[] = [
                'point' => $point->label,
                'peopleToday' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = CURDATE()')->count(),
                'profitToday' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = CURDATE()')->sum('cost'),
                'peopleTomorrow' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = CURDATE()-1')->count(),
                'profitTomorrow' => Orders::find()->where(['pointId' => $point->id])->andWhere('`date` = CURDATE()-1')->sum('cost'),
                'peopleThisMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(CURDATE())')->count(),
                'profitThisMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(CURDATE())')->sum('cost'),
                'peoplePrevMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(DATE_ADD(CURDATE(), INTERVAL -1 MONTH))')->count(),
                'profitPrevMonth' => Orders::find()->where(['pointId' => $point->id])->andWhere('MONTH(`date`) = MONTH(DATE_ADD(CURDATE(), INTERVAL -1 MONTH))')->sum('cost'),
                'debt' => Orders::find()->where(['pointId' => $point->id])->sum('debt'),
            ];
        }

        return $this->render('index',[
            'clients' => $clients,
            'stats' => $stats,
            'tasks' => $tasks
        ]);

    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
