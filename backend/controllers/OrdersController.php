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
use backend\models\Ticket;
use yii\helpers\ArrayHelper;
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

            $Model = Ticket::ticketModel($order->typeId);
            $tickets = Model::createMultiple($Model);
            Model::loadMultiple($tickets, Yii::$app->request->post());

            // validate all models

            $valid = Model::validateMultiple($tickets);

            if ($valid) {
                $cost = 0;
                $discount = 0;
                foreach ($tickets as $ticket) {
                    $ticket->orderId = $order->id;
                    $ticket->clientId = $order->clientId;
                    $ticket->save(false);
                    $cost += $ticket->cost - ($ticket->cost * $ticket->discount / 100);
                    $discount += $ticket->cost * $ticket->discount / 100;
                }
                $order->ticketCost = $cost;
                $order->ticketDiscount = $discount;
                $order->calculate();
                $order->save();
                return $order->id;
            }
        }
        
        return $this->render('form',[
            'orders' => $order,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $orders = Orders::findOne($id);

        //Определяем тип квитанции
        $ticket = Ticket::ticketModel($orders->typeId);

        //Получение всех записей для квитанции
        $model = $ticket::find()->where(['orderId' => $orders->id])->all();

        if ($orders->load(Yii::$app->request->post()) && $orders->validate()) {

            //Счетчик перечисток
            if($orders->statusId == Orders::STATUS_RECLEAN && $orders->getOldAttribute('statusId') != Orders::STATUS_RECLEAN){
                $orders->updateCounters(['ccount' => 1]);
            }

            if (Yii::$app->request->isPost) {

                //Список старых записей
                $modelOldIDs = ArrayHelper::map($model, 'id', 'id');

                //Множественное создание моделей
                $model = Model::createMultiple($ticket, $model);

                //Загрузка данных в модель из POST
                Model::loadMultiple($model, Yii::$app->request->post());

                //Удаленные записи
                $modelDeletedIDs = array_diff($modelOldIDs, array_filter(ArrayHelper::map($model, 'id', 'id')));

                //Валидация всех моделей
                $valid = Model::validateMultiple($model);



                if($valid){
                    if (! empty($modelDeletedIDs)) {
                        $ticket::deleteAll(['id' => $modelDeletedIDs]);
                    }
                    $cost = 0;
                    $discount = 0;
                    foreach ($model as $item) {
                        $item->orderId = $orders->id;
                        $item->clientId = $orders->clientId;
                        $item->save(false);
                        $cost += $item->cost - ($item->cost * $item->discount / 100);
                        $discount += $item->cost * $item->discount / 100;
                    }
                    //Обновление задолженности и стоимости с учетом скидки для точки
                    $orders->ticketCost = $cost;
                    $orders->ticketDiscount = $discount;
                    $orders->calculate();
                    $orders->save();
                    Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
                }
            }
        }
        $request = Yii::$app->request;
        if ($request->isAjax) {
            return $this->renderAjax('form',[
                'orders' => $orders,
                'action' => 'reception',
                'model' => (empty($model)) ? [new $ticket] : $model,
                'template' => $ticket::TEMPLATE
            ]);
        }else{
            return $this->render('form',[
                'orders' => $orders,
                'action' => 'update',
                'model' => (empty($model)) ? [new $ticket] : $model,
                'template' => $ticket::TEMPLATE
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
