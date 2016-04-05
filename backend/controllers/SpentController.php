<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\Spent;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class SpentController extends Controller
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
                        'actions' => ['index', 'search', 'create', 'update', 'delete'],
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
        $dataProvider = new ActiveDataProvider([
            'query' => Spent::find(),
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ],
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate(){
        $spent = new Spent();
        if ($spent->load(Yii::$app->request->post()) && $spent->validate()) {
            $spent->save();
            Yii::$app->getSession()->setFlash('success', 'Расходы добавлены');
            return $this->redirect(['spent/index']);
        }
        return $this->render('form',[
            'spent' => $spent,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $spent = Spent::findOne($id);
        if ($spent->load(Yii::$app->request->post()) && $spent->validate()) {
            $spent->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }
        return $this->render('form',[
            'spent' => $spent,
            'action' => 'update'
        ]);
    }

    public function actionDelete($id){
        $spent = spent::findOne($id);
        $spent->delete();
        Yii::$app->getSession()->setFlash('success', 'Запись удалена');
        return $this->redirect(['spent/index']);
    }
}
