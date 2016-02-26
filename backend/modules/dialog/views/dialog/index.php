<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\settings\Managers;

/* @var $this yii\web\View */

$this->title = 'Диалоги';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-4">
        <h4>Диалоги</h4>
        <? foreach($dialogs as $dialog): ?>
            <a href="<?= Url::to(['/dialog/dialog/view', 'room' => $dialog->id])?>">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-xs-1">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="col-xs-9">
                            <? if($dialog->fromId == $user->managerId): ?>
                                <?= Managers::findOne($dialog->toId)->managerName ?>
                            <? else: ?>
                                <?= Managers::findOne($dialog->fromId)->managerName ?>
                            <? endif ?>
                        </div>
                        <div class="col-xs-1">
                            <span class="badge">42</span>
                        </div>
                    </div>
                </div>
            </a>
        <? endforeach ?>
    </div>
    <div class="col-md-4">
        <h4>Групповые диалоги</h4>
        <? foreach($dialogs as $dialog): ?>
            <div class="panel panel-default">
                <div class="panel-body">

                </div>
            </div>
        <? endforeach ?>
    </div>
    <div class="col-md-4">
        <h4>Задачи</h4>
        <? foreach($dialogs as $dialog): ?>
            <div class="panel panel-default">
                <div class="panel-body">

                </div>
            </div>
        <? endforeach ?>
    </div>
</div>