<?php
namespace backend\modules\dialog\controllers;

use backend\modules\dialog\models\Last;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use backend\models\settings\Managers;
use backend\modules\dialog\models\Rooms;
use backend\modules\dialog\models\Msg;
use backend\modules\dialog\models\Participants;
use backend\models\Model;

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
                        'actions' => ['index', 'view', 'new-msg', 'ajax', 'new-private', 'new-group', 'delete'],
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
        $participants = Participants::find()->select('roomId')->where(['userId' => $user->managerId]);

        return $this->render('index', [
            'private' => Rooms::find()
                ->where(['type' => Rooms::PRIVATE_DIALOG])
                ->andWhere(['id' => $participants])
                ->all(),
            'group' => Rooms::find()
                ->where(['type' => Rooms::GROUP_DIALOG])
                ->andWhere(['id' => $participants])
                ->all(),
            'task' => Rooms::find()
                ->where(['type' => Rooms::TASK])
                ->andWhere(['id' => $participants])
                ->all(),
        ]);

    }

    public function actionNewGroup()
    {
        $participants = new Participants();
        if ($participants->load(Yii::$app->request->post()) && $participants->validate()) {
            $room = new Rooms();
            $room->type = Rooms::GROUP_DIALOG;
            $room->save();


            $model = Model::createMultiple($participants);
            Model::loadMultiple($model, Yii::$app->request->post());


            $valid = Model::validateMultiple($model);
            if($valid){
                foreach ($model as $item){
                    $item->timestamp = microtime(true);
                    $item->roomId = $room->id;
                    $item->userId = $participants->user;
                    $item->save();
                }
            }

            $this->redirect(['dialog/view', 'id' => $room->id]);
        }
    }

    public function actionNewPrivate()
    {
        $participants = new Participants();
        if ($participants->load(Yii::$app->request->post()) && $participants->validate()) {
            $room = new Rooms();
            $room->type = Rooms::PRIVATE_DIALOG;
            $room->from = Yii::$app->user->identity->managerId;
            $room->to = $participants->user;
            $room->save();


            $participants->timestamp = microtime(true);
            $participants->roomId = $room->id;
            $participants->userId = $participants->user;

            $participants2 = clone $participants;
            $participants2->userId = Yii::$app->user->identity->managerId;

            $participants->save();
            $participants2->save();

            $this->redirect(['dialog/view', 'id' => $room->id]);
        }
    }

    public function actionNewMsg($id)
    {
        $msg = new Msg();
        if ($msg->load(Yii::$app->request->post()) && $msg->validate()) {
            $msg->timestamp = microtime(true);
            $msg->roomId = $id;
            $msg->userId = Yii::$app->user->identity->managerId;
            $msg->save();
        }
    }

    public function actionView($id)
    {
        $room = Rooms::findOne($id);
        if (! Last::findOne(['roomId' => $id, 'userId' => Yii::$app->user->identity->managerId])){
            $last = new Last();
            $last->userId = Yii::$app->user->identity->managerId;
            $last->roomId = $id;
            $last->timestamp = microtime(true);
            $last->save();
        }
        $old = Msg::find()
            ->where(['roomId' => $id])
            ->andWhere('timestamp < :last', [':last' => $room->getLastViewTime()])
            ->with('managers')
            ->orderBy('timestamp', SORT_DESC)
            ->all();
        $new = Msg::find()
            ->where(['roomId' => $id])
            ->andWhere('timestamp > :last', [':last' => $room->getLastViewTime()])
            ->with('managers')
            ->orderBy('timestamp', SORT_DESC)
            ->all();

        $this->setLast($id);

        return $this->render('room', [
            'room' => $room,
            'old' => $old,
            'new' => $new
        ]);
    }
    
    public function actionAjax($id){
        $room = Rooms::findOne($id);
        $new = Msg::find()
            ->where(['roomId' => $id])
            ->andWhere('timestamp > :last', [':last' => $room->getLastViewTime()])
            ->with('managers')
            ->orderBy('timestamp', SORT_DESC)
            ->all();

        $this->setLast($id);

        return $this->renderPartial('ajax', [
            'new' => $new
        ]);
    }

    private function setLast($id){
        $last = Last::findOne(['roomId' => $id, 'userId' => Yii::$app->user->identity->managerId]);
        $last->timestamp = microtime(true);
        $last->save();
    }

    public function actionDelete($id){
        $participants = Participants::find()->where(['roomId' => $id]);
        if($participants->count() == 1){
            Rooms::findOne($id)->delete();
        }else{
            $participants = Participants::findOne(['roomId' => $id, 'userId' => Yii::$app->user->identity->managerId]);
            $participants->delete();
        }
        $this->redirect(['dialog/index']);
    }
}
