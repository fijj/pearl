<?php
namespace backend\controllers;

use backend\models\Textile;
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

            //Создание квитанции
            switch ($orders->typeId){
                case(Orders::TYPE_SUIT):
                    $ticket = new Textile();
                    break;
                case(Orders::TYPE_COAT):
                    $ticket = new Textile();
                    break;
                case(Orders::TYPE_TEXTILE):
                    $ticket = new Textile();
                    break;
                case(Orders::TYPE_LEATHER):
                    $ticket = new Leather();
                    break;
                case(Orders::TYPE_PILLOW):
                    $ticket = new Textile();
                    break;
                case(Orders::TYPE_LEATHER_PAINT):
                    $ticket = new Leather();
                    break;
                case(Orders::TYPE_CARPET):
                    $ticket = new Carpet();
                    break;
                case(Orders::TYPE_FURNITURE):
                    $ticket = new Textile();
                    break;
            }
            $ticket->orderId = $orders->id;
            $ticket->clientId = $orders->clientId;
            $ticket->save(false);
            return $this->redirect(['ticket/update', 'id' => $orders->id]);
        }
        return $this->render('form',[
            'orders' => $orders,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $orders = Orders::findOne($id);
        if ($orders->load(Yii::$app->request->post()) && $orders->validate()) {

            //Доход с учетом скидки для точки
            $orders->costTotal = $orders->costTotal();

            //Расчет задолженности
            $orders->debt = $orders->debt();

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
