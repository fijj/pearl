<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\settings\Managers;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
\app\modules\dialog\assets\DialogAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body chat-container" data-url=<?= Url::to(['dialog/ajax', 'id' => $room->id]) ?>>
                <? foreach ($old as $msg): ?>
                    <div class="col-md-10 col-md-offset-<?= (Yii::$app->user->identity->managerId == $msg->userId) ? '0' : '2' ?>">
                        <div class="row msg-container">
                            <div class="msg-text">
                                <div class="row">
                                    <div class="msg-timestamp col-md-12">
                                        <?= $msg->time ?>
                                        <span class="label label-default pull-right"><?= (Yii::$app->user->identity->managerId == $msg->userId) ? false : $msg->managers->managerName ?></span>
                                    </div>
                                </div>
                                <?= $msg->text ?>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>

                <? foreach ($new as $msg): ?>
                    <div class="col-md-10 col-md-offset-<?= (Yii::$app->user->identity->managerId == $msg->userId) ? '0' : '2' ?>">
                        <div class="row msg-container">
                            <div class="msg-text new">
                                <div class="row">
                                    <div class="msg-timestamp col-md-12">
                                        <?= $msg->time ?>
                                        <span class="label label-default pull-right"><?= (Yii::$app->user->identity->managerId == $msg->userId) ? false : $msg->managers->managerName ?></span>
                                    </div>
                                </div>
                                <?= $msg->text ?>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <?
        $form = ActiveForm::begin([
            'id' => 'msg-form',
            'action' => ['/dialog/dialog/new-msg', 'id' => $room->id],
        ]);
        ?>

        <?= $form->field(new \backend\modules\dialog\models\Msg(), "text")->input('text', ['placeholder' => 'Сообщение...'])->label(false) ?>

        <? ActiveForm::end(); ?>
    </div>
</div>

<style>
    .chat-container{
        min-height: 300px;
        max-height: 500px;
        overflow-y: scroll;
    }
    .msg-container{
        margin: 15px;
    }
    .msg-text{
        padding: 10px;
        border-radius: 5px;
        background-color: #fafafa;
    }

    .msg-text.old{
        background-color: #fafafa;
    }

    .msg-text.new{
        background-color: #d7e4f7;
    }

    .msg-timestamp{
        font-size: 9px;
    }
    .msg-timestamp span{
        font-size: 11px;
    }
</style>
<script>
    (function () {
        window.onload = function() {
            var chat = document.querySelector('.chat-container');
            chat.scrollTop = chat.scrollHeight;
        };
    }());
</script>