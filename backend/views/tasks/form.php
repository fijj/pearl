<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Задачи',
    'url' => Url::to(['tasks/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $tasks->title,
    ];
}else{
    $this->params['breadcrumbs'][] = [
        'label' => 'Новая',
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'tasks-form',
])
?>

<?= $form->field($tasks, 'title') ?>
<?= $form->field($tasks, 'message')->textarea() ?>
<?= $form->field($tasks, 'type')->dropDownList($tasks->typeArr) ?>
<?= $form->field($tasks, 'status')->dropDownList($tasks->statusArr) ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>
<?php ActiveForm::end() ?>