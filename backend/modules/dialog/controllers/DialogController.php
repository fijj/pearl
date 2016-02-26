<?php
namespace backend\modules\dialog\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use backend\models\settings\Managers;
use backend\modules\dialog\models\Rooms;
use backend\modules\dialog\models\Msg;

/**
 * Site controller
 */
class DialogController extends Controller
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
                        'actions' => ['index'],
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

    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        return $this->render('index', [
            'dialogs' => Rooms::find()
                    ->where(['type' => Rooms::DIALOG, 'fromId' => $user->managerId])
                    ->orWhere(['type' => Rooms::DIALOG, 'toId' => $user->managerId])
                    ->all(),
            'groupDialogs' => Rooms::findAll(['type' => Rooms::GROUP_DIALOG]),
            'tasks' => Rooms::findAll(['type' => Rooms::TASK]),
            'user' => $user
        ]);
    }

    public function actionNewRoom()
    {

    }

    public function actionNewMsg()
    {

    }

    public function actionViewRoom()
    {

    }
}
