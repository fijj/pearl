<?php
namespace backend\controllers;

use backend\models\Tasks;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class TasksController extends Controller
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

        $searchModel = new Tasks();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionNew(){
        $tasks = new Tasks();
        if ($tasks->load(Yii::$app->request->post()) && $tasks->validate()) {
            $tasks->date = date('Y-m-d');
            $tasks->save();
            Yii::$app->getSession()->setFlash('success', 'Запись создана');
            return $this->redirect(['tasks/index']);
        }
        return $this->render('form',[
            'tasks' => $tasks,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $tasks = Tasks::findOne($id);
        if ($tasks->load(Yii::$app->request->post()) && $tasks->validate()) {
            $tasks->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }
        return $this->render('form',[
            'tasks' => $tasks,
            'action' => 'update'
        ]);
    }

    public function actionDelete($id){
        $tasks = Tasks::findOne($id);
        $tasks->delete();
        Yii::$app->getSession()->setFlash('success', 'Запись удалена');
        return $this->redirect(['tasks/index']);
    }
}
