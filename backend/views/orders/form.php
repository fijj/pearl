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
    'id' => 'order-form',
    'options' => [
        'ajax' => $ajax,
    ]
])
?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($orders, 'date')->input('date', ['class' => 'datepicker form-control']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($orders, 'outDate')->input('date', ['class' => 'datepicker form-control']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($orders, 'number') ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($orders, 'contract') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($orders, 'typeId')->dropDownList(Type::dropDownArray()) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($orders, 'pointId')->dropDownList(Point::dropDownArray()) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($orders, 'statusId')->dropDownList(Status::dropDownArray()) ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($orders, 'cost') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($orders, 'paid') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($orders, 'costTotal')->input('integer', ['readonly' => 'true', 'placeholder' => 'рассчитывается после сохранения']) ?>
                </div>
            </div>
        </div>
    </div>


    <p>Перечисток: <strong><?= $orders->ccount ?></strong></p>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

<?php ActiveForm::end() ?>