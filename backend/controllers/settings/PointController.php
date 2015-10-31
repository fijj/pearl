<?php
namespace backend\controllers\settings;

use backend\models\settings\Point;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class PointController extends Controller
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

        $point = Point::find()->all();
        return $this->render('index',[
            'point' => $point,
        ]);
    }

    public function actionNew(){
        $point = new Point();
        if ($point->load(Yii::$app->request->post()) && $point->validate()) {
            $point->save();
            Yii::$app->getSession()->setFlash('success', 'Карточка точки создана');
            return $this->redirect(['settings/point/index']);
        }
        return $this->render('form',[
            'point' => $point,
            'action' => 'create'
        ]);

    }

    public function actionUpdate($id){
        $point = Point::findOne($id);
        if ($point->load(Yii::$app->request->post()) && $point->validate()) {
            $point->save();
            Yii::$app->getSession()->setFlash('success', 'Изменения сохранены');
        }
        return $this->render('form',[
            'point' => $point,
            'action' => 'update'
        ]);
    }

    public function actionDelete($id){
        $point = Point::findOne($id);
        $point->delete();
        Yii::$app->getSession()->setFlash('success', 'Запись удалена');
        return $this->redirect(['settings/point/index']);
    }
}
