<?php
namespace backend\controllers;

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

        $searchModel = new Clients();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionSearch($term){
        $model = Clients::find()->where(['like', 'firstName',  $term])->orWhere(['like', 'phone',  $term])->limit(10)->all();
        foreach ($model as $key => $data){
            $array[$key]['id'] = $data->id;
            $array[$key]['label'] = $data->firstName.' '.$data->secondName.' '.$data->thirdName.' '.$data->phone;
        }
        echo json_encode($array);
    }

    public function actionNew(){
        $clients = new Clients();
        if ($clients->load(Yii::$app->request->post()) && $clients->validate()) {
            $clients->save();
            Yii::$app->getSession()->setFlash('success', 'Карточка клиента создана');
            return $this->redirect(['clients/index']);
        }
        return $this->render('form',[
            'clients' => $clients,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $clients = Clients::findOne($id);
        if ($clients->load(Yii::$app->request->post()) && $clients->validate()) {
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
        $clients->delete();
        Yii::$app->getSession()->setFlash('success', 'Запись удалена');
        return $this->redirect(['clients/index']);
    }
}
