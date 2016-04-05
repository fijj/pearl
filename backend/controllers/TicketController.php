<?php
namespace backend\controllers;

use backend\models\Orders;
use Yii;
use yii\base\Model;
use yii\base\Object;
use yii\BaseYii;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Ticket1;
use backend\libs\Barcode;

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

        $model = new Ticket1();

        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionUpdate($id){
        $order = Orders::findOne($id);
        if($order->typeId == 3){
            $model = Ticket1::findOne(['orderId' => $order->id]);
            $view = 1;
        }

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }

        return $this->render('ticket-'.$view,[
            'model' => $model,
        ]);
    }

    public function actionBarcode(){
        Barcode::generate();
    }

    public function actionPrint($id){
        $model = Ticket1::findOne($id);

        return $this->renderPartial('print-1',[
            'model' => $model,
        ]);
    }

}
