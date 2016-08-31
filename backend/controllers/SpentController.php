<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\spent\SpentRelation;
use backend\models\spent\SpentCommon;
use backend\models\spent\SpentCleaner;
use backend\models\spent\SpentCarpet;
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
            'query' => SpentRelation::find(),
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
    
        $spentRelation = new SpentRelation();
        $spentCommon = new SpentCommon();
        $spentCleaner = new SpentCleaner();
        $spentCarpet = new SpentCarpet();

        if(
            $spentRelation->load(Yii::$app->request->post())&&
            $spentCommon->load(Yii::$app->request->post())&&
            $spentCleaner->load(Yii::$app->request->post())&&
            $spentCarpet->load(Yii::$app->request->post())&&
            $spentRelation->validate()&&
            $spentCommon->validate()&&
            $spentCleaner->validate()&&
            $spentCarpet->validate()
        ){

            $spentRelation->save();
            $spentCommon->relationId = $spentCleaner->relationId = $spentCarpet->relationId = $spentRelation->id;
            $spentCommon->save();
            $spentCleaner->save();
            $spentCarpet->save();
            Yii::$app->getSession()->setFlash('success', 'Расходы добавлены');
            return $this->redirect(['spent/index']);
        }


        return $this->render('form',[
            'spentRelation' => $spentRelation,
            'spentCommon' => $spentCommon,
            'spentCleaner' => $spentCleaner,
            'spentCarpet' => $spentCarpet,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){

        $spentRelation = SpentRelation::findOne($id);
        $spentCommon = SpentCommon::findOne(['relationId' => $id]);
        $spentCleaner = SpentCleaner::findOne(['relationId' => $id]);
        $spentCarpet = SpentCarpet::findOne(['relationId' => $id]);

        if(
            $spentRelation->load(Yii::$app->request->post())&&
            $spentCommon->load(Yii::$app->request->post())&&
            $spentCleaner->load(Yii::$app->request->post())&&
            $spentCarpet->load(Yii::$app->request->post())&&
            $spentRelation->validate()&&
            $spentCommon->validate()&&
            $spentCleaner->validate()&&
            $spentCarpet->validate()
        ){

            $spentRelation->save();
            $spentCommon->save();
            $spentCleaner->save();
            $spentCarpet->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }
        
        return $this->render('form',[
            'spentRelation' => $spentRelation,
            'spentCommon' => $spentCommon,
            'spentCleaner' => $spentCleaner,
            'spentCarpet' => $spentCarpet,
            'action' => 'update'
        ]);
    }

    public function actionDelete($id){
        $spent = SpentRelation::findOne($id);
        $spent->delete();
        Yii::$app->getSession()->setFlash('success', 'Запись удалена');
        return $this->redirect(['spent/index']);
    }
}
