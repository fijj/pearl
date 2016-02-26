<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use backend\models\Orders;
use backend\models\Ticket1;
use backend\models\Ticket2;
use backend\models\Ticket3;

/**
 * Site controller
 */
class OrdersController extends Controller
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
        $orders = new Orders();
        if ($orders->load(Yii::$app->request->post()) && $orders->validate()) {
            $orders->clientId = $id;
            $orders->managerId = Yii::$app->user->identity->managerId;
            $orders->costTotal = $orders->costTotal();
            $orders->debt = $orders->debt();
            $orders->save();

            if($orders->typeId == 4){
                $ticket = new Ticket1();
                $ticket->orderId = $orders->id;
                $ticket->clientId = $orders->clientId;
                $ticket->save();
                return $this->redirect(['ticket/update', 'id' => $ticket->id, 'ticket' => '1']);
            }

            elseif($orders->typeId == 7){
                $ticket = new Ticket2();
                $ticket->orderId = $orders->id;
                $ticket->clientId = $orders->clientId;
                $ticket->save();
                return $this->redirect(['ticket/update', 'id' => $ticket->id, 'ticket' => '2']);
            }

            else{
                $ticket = new Ticket3();
                $ticket->orderId = $orders->id;
                $ticket->clientId = $orders->clientId;
                $ticket->save();
                return $this->redirect(['ticket/update', 'id' => $ticket->id, 'ticket' => '3']);
            }

            Yii::$app->getSession()->setFlash('success', 'Заказ создан');
            return $this->redirect(['orders/index']);
        }
        return $this->render('form',[
            'orders' => $orders,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $orders = Orders::findOne($id);
        if ($orders->load(Yii::$app->request->post()) && $orders->validate()) {
            $orders->costTotal = $orders->costTotal();
            $orders->debt = $orders->debt();
            $orders->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }

        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('form',[
                'orders' => $orders,
                'action' => 'update'
            ]);
        }else{
            return $this->render('form',[
                'orders' => $orders,
                'action' => 'update'
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
