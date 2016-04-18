<?php
namespace backend\controllers;

use backend\models\Orders;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Clients;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class ClientsController extends Controller
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
                        'actions' => ['logout', 'index', 'search', 'new', 'update', 'delete', 'view'],
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

        $searchModel = new Clients();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionSearch($term){
        $model = Clients::find()->where(['like', 'fullName',  $term])->orWhere(['like', 'phone',  $term])->limit(10)->all();
        foreach ($model as $key => $data){
            $array[$key]['id'] = $data->id;
            $array[$key]['label'] = $data->fullName.' '.$data->phone.' | Заказов:'.Orders::find()->where(['clientId' => $data->id])->count();;
        }
        echo json_encode($array);
    }

    public function actionView($id){
        $client = Clients::findOne($id);
        $orders['total'] = Orders::find()->where(['clientId' => $id])->sum('cost');
        $orders['debt'] = Orders::find()->where(['clientId' => $id])->sum('debt');
        $orders['visits'] = Orders::find()->where(['clientId' => $id])->count();

        $dataProvider['ready'] = new ActiveDataProvider([
            'query' => Orders::find()->where(['clientId' => $id, 'statusId' => Orders::STATUS_READY]),
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ],
            ],
        ]);
        $dataProvider['workshop'] = new ActiveDataProvider([
            'query' => Orders::find()->where(['clientId' => $id, 'statusId' => Orders::STATUS_IN_WORKSHOP]),
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ],
            ],
        ]);
        $dataProvider['history'] = new ActiveDataProvider([
            'query' => Orders::find()->where(['clientId' => $id, 'statusId' => Orders::STATUS_HISTORY]),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ],
            ],
        ]);

        return $this->render('view',[
            'dataProvider' => $dataProvider,
            'client' => $client,
            'orders' => $orders,
            'action' => 'create'
        ]);

    }

    public function actionNew(){
        $clients = new Clients();
        if ($clients->load(Yii::$app->request->post()) && $clients->validate()) {
            $clients->fullName = $clients->firstName.' '.$clients->secondName.' '.$clients->thirdName;
            $clients->save();
            Yii::$app->getSession()->setFlash('success', 'Карточка клиента создана');
            return $this->redirect(['orders/new', 'id' => $clients->id]);
        }
        return $this->render('form',[
            'clients' => $clients,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $clients = Clients::findOne($id);
        if ($clients->load(Yii::$app->request->post()) && $clients->validate()) {
            $clients->fullName = $clients->firstName.' '.$clients->secondName.' '.$clients->thirdName;
            $clients->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }
        return $this->render('form',[
            'clients' => $clients,
            'action' => 'update'
        ]);
    }

    public function actionDelete($id){
        $clients = Clients::findOne($id);
        $orders = Orders::find()->where(['clientId' => $id])->count();
        if($orders > 0){
            Yii::$app->getSession()->setFlash('error', 'У клиента есть заказы, удаление запрещено');
            return $this->redirect(['clients/index']);
        }else{
            $clients->delete();
            Yii::$app->getSession()->setFlash('success', 'Запись удалена');
            return $this->redirect(['clients/index']);
        }
    }
}
