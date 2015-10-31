<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\settings\Point;
use backend\models\settings\Status;
use backend\models\settings\Type;

/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Заказы',
    'url' => Url::to(['orders/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $orders->number,
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'clients-form',
])
?>

<?= $form->field($orders, 'date')->input('date', ['class' => 'datepicker form-control']) ?>
<?= $form->field($orders, 'number') ?>
<?= $form->field($orders, 'typeId')->dropDownList(Type::dropDownArray()) ?>
<?= $form->field($orders, 'pointId')->dropDownList(Point::dropDownArray()) ?>
<?= $form->field($orders, 'statusId')->dropDownList(Status::dropDownArray()) ?>
<?= $form->field($orders, 'outDate')->input('date', ['class' => 'datepicker form-control']) ?>
<?= $form->field($orders, 'cost') ?>
<?= $form->field($orders, 'paid') ?>
<?= $form->field($orders, 'costTotal')->input('integer', ['readonly' => 'true', 'placeholder' => 'рассчитывается после сохранения']) ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

<?php ActiveForm::end() ?>