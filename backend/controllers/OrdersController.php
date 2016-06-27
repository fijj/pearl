<?php
namespace backend\controllers;

use backend\models\Textile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\Orders;
use backend\models\Model;
/**
 * Site controller
 */
class OrdersController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;
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
                        'actions' => ['logout', 'index', 'search', 'new', 'update', 'delete'],
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
    public function actionIndex(){

        $searchModel = new Orders();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionNew($id){
        $order = new Orders();
        if ($order->load(Yii::$app->request->post())) {
            $order->clientId = $id;
            $order->managerId = Yii::$app->user->identity->managerId;
            $order->save();
            return $order->id;
        }

        return $this->render('form',[
            'orders' => $order,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $orders = Orders::findOne($id);
        if ($orders->load(Yii::$app->request->post()) && $orders->validate()) {

            $orders->calculate();

            //Счетчик перечисток
            if($orders->statusId == Orders::STATUS_RECLEAN && $orders->getOldAttribute('statusId') != Orders::STATUS_RECLEAN){
                $orders->updateCounters(['ccount' => 1]);
            }
            $orders->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('form',[
                'orders' => $orders,
                'action' => 'update',
                'ajax' => 'true'
            ]);
        }else{
            return $this->render('form',[
                'orders' => $orders,
                'action' => 'update',
                'ajax' => 'false'
            ]);
        }
    }

    public function actionDelete($id){
        $orders = Orders::findOne($id);
        $orders->delete();
        Yii::$app->getSession()->setFlash('success', 'Запись удалена');
        return $this->redirect(['orders/index']);
    }
}
