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
<style>
    label{
        color: white;
    }
    .form-control {
        height: 50px;
        border-radius: 0px;
        box-shadow: none;
        border: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        position: relative;
    }

    select::before{
        content: "";
        display: block;
        position: absolute;
        left: 0px;
        bottom: 0px;
        width: 250px;
        height: 250px;
        background-color: #394958;
        z-index: 9000;
    }
    .block-header{
        height: 90px;
        padding: 30px 100px;
        background-color: #394958;

    }
    .block-header h2{
        padding-left: 50px;
        font-size: 18px;
        line-height: 36px;
        color: white;
        background: url("img/order.png") no-repeat;
    }
    .block-type-1{
        padding: 55px 55px;
        background-color: #4fc1e9;
        border-right: 1px solid #20b1e8;
    }
    .reclean{
        height: 90px;
        padding-top: 80px;
        background: url("img/reclean.png") no-repeat center;
    }
    .reclean p{
        text-align: center;
        font-size: 12px;
        color: #abdef3;
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header">
                <h2>КВИТАНЦИЯ</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-3 block-type-1">
            <?= $form->field($orders, 'date')->input('date', ['class' => 'datepicker form-control']) ?>
            <?= $form->field($orders, 'outDate')->input('date', ['class' => 'datepicker form-control']) ?>
        </div>
        <div class="col-md-2 block-type-1">
            <?= $form->field($orders, 'pointId')->dropDownList(Point::dropDownArray()) ?>
            <? if ($action == 'update'): ?>
                <?= $form->field($orders, 'typeId')->dropDownList(Type::dropDownArray(), ['disabled' => '']) ?>
            <? else: ?>
                <?= $form->field($orders, 'typeId')->dropDownList(Type::dropDownArray()) ?>
            <? endif ?>
        </div>
        <div class="col-md-2 block-type-1">
            <?= $form->field($orders, 'number') ?>
            <?= $form->field($orders, 'contract') ?>
        </div>
        <div class="col-md-2 block-type-1">
            <?= $form->field($orders, 'statusId')->dropDownList(Status::dropDownArray()) ?>
            <div class="reclean">
                <p>перечисток: <strong><?= $orders->ccount ?></strong></p>
            </div>
        </div>
        <div class="col-md-3 block-type-1">
            <?= $form->field($orders, 'deliveryCost') ?>
            <?= $form->field($orders, 'paid') ?>
        </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($orders, 'paid') ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($orders, 'delivery')->checkbox() ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($orders, 'deliveryCost') ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($orders, 'cost') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($orders, 'costTotal')->input('integer', ['readonly' => 'true', 'placeholder' => 'рассчитывается после сохранения']) ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p>Перечисток: <strong><?= $orders->ccount ?></strong></p>
    </div>
<? if ($action == 'update'): ?>
    <?= Html::a('Квитанция', ['ticket/update', 'id' => $orders->id], ['class' => 'btn btn-warning']) ?>
<? endif ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

<?php ActiveForm::end() ?>