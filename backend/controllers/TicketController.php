<?php
namespace backend\controllers;

use backend\models\Orders;
use Yii;
use backend\models\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\libs\Barcode;
use yii\helpers\ArrayHelper;
use backend\models\Textile;
use backend\models\Carpet;
use backend\models\Leather;

/**
 * Site controller
 */
class TicketController extends Controller
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
                        'actions' => ['logout', 'index', 'search', 'new', 'update', 'delete', 'view', 'barcode', 'print'],
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

        $model = new Textile();

        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){
        //Поиск заказа
        $order = Orders::findOne($id);

        //Определение типа квитанции
        $ticket = $this->ticketModel($order);

        //Получение всех записей для квитанции
        $model = $ticket::find()->where(['orderId' => $order->id])->all();

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
                foreach ($model as $item) {
                    $item->orderId = $order->id;
                    $item->clientId = $order->clientId;
                    $item->save(false);
                    $cost += $item->cost - ($item->cost * $item->discount / 100);
                }
                //Обновление задолженности и стоимости с учетом скидки для точки
                $order->ticketCost = $cost;
                $order->calculate();
                $order->save();
                Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
            }
        }
        return $this->render('form/'.$ticket::TEMPLATE,[
            'order' => $order,
            'model' => (empty($model)) ? [new $ticket] : $model
        ]);
    }

    public function actionBarcode($code){
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        echo $generator->getBarcode($code, $generator::TYPE_CODE_128, 3, 60);
    }

    public function actionPrint($id){
        $order = Orders::findOne($id);
        $Ticket = $this->ticketModel($order);
        $models = $Ticket::findAll(['orderId' => $id]);
        return $this->renderPartial('print/'.$Ticket::TEMPLATE,[
            'order' => $order,
            'models' => $models
        ]);
    }

    private function ticketModel($order)
        //Определение типа квитанции
    {
        switch ($order->typeId){
            case(Orders::TYPE_SUIT):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_COAT):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_TEXTILE):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_LEATHER):
                $ticket = Leather::className();
                break;
            case(Orders::TYPE_PILLOW):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_LEATHER_PAINT):
                $ticket = Leather::className();
                break;
            case(Orders::TYPE_CARPET):
                $ticket = Carpet::className();
                break;
            case(Orders::TYPE_FURNITURE):
                $ticket = Textile::className();
                break;
        }

        return $ticket;
    }

}
