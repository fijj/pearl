<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\settings\Managers;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use backend\modules\dialog\models\Participants;
use backend\modules\dialog\models\Rooms;
/* @var $this yii\web\View */

$this->title = 'Диалоги';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-md-4">
        <h4>Приватные диалоги</h4>
        <? $form = ActiveForm::begin([
                'id' => 'new-private',
                'action' => Url::to(['dialog/new-private'])
            ]);
        ?>
        <div class="row">
            <div class="col-xs-10">
                <?= $form->field(new Participants(), 'user')->dropDownList(Managers::managerArrWithoutOwner())->label(false) ?>
            </div>
            <div class="col-xs-2">
                <?= Html::submitButton('+', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <? ActiveForm::end() ?>
        
        <? foreach($private as $room): ?>
            <a href="<?= Url::to(['/dialog/dialog/view', 'id' => $room->id])?>">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2">
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <div class="col-xs-6">
                                <? if($room->from == Yii::$app->user->identity->managerId): ?>
                                    <?= $room->managersTo->managerName ?>
                                <? else: ?>
                                    <?= $room->managersFrom->managerName ?>
                                <? endif; ?>
                            </div>
                            <div class="col-xs-2">
                                <? if ($room->newCount): ?>
                                    <span class="label label-danger"><?= $room->newCount ?></span>
                                <? endif ?>
                            </div>
                            <div class="col-xs-2">
                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['/dialog/dialog/delete', 'id' => $room->id]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <? endforeach ?>
    </div>
    <div class="col-md-4">
        <h4>Групповые диалоги</h4>
        <? $form = ActiveForm::begin([
            'id' => 'new-group',
            'action' => Url::to(['dialog/new-group'])
        ]);
        ?>
        <div class="row">
            <div class="col-xs-10">
                <?= $form->field(new Participants(), 'userId')->widget(Select2::className(), [
                    'data' => Managers::managerArrWithoutOwner(),
                    'options' => ['placeholder' => 'Участники...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => true
                    ],
                ])->label(false); ?>
            </div>
            <div class="col-xs-2">
                <?= Html::submitButton('+', ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-xs-12">
                <?= $form->field(new Rooms, 'title')->input('text', ['placeholder' => 'Тема'])->label(false) ?>
            </div>
        </div>
        <? ActiveForm::end() ?>
        <? foreach($group as $room): ?>
            <a href="<?= Url::to(['/dialog/dialog/view', 'id' => $room->id])?>">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-2">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </div>
                            <div class="col-xs-6">
                                <?= $room->title ?>
                            </div>
                            <div class="col-xs-2">
                                <? if ($room->newCount): ?>
                                    <span class="label label-danger"><?= $room->newCount ?></span>
                                <? endif ?>
                            </div>
                            <div class="col-xs-2">
                                <?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['/dialog/dialog/delete', 'id' => $room->id]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <? endforeach ?>
    </div>
    <div class="col-md-4">
        <h4>Задачи</h4>
        <? foreach($task as $room): ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-xs-9">

                    </div>
                    <div class="col-xs-1">
                        <? if ($room->newCount): ?>
                            <span class="badge"><?= $room->newCount ?></span>
                        <? endif ?>
                    </div>
                </div>
            </div>
        <? endforeach ?>
    </div>
</div>