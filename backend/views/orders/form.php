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
        height: 48px;
        border-radius: 0px;
        box-shadow: none;
        border: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        position: relative;
    }

    select.form-control{
        overflow: hidden;
        background: url("img/arrow.png") no-repeat 148px #ffffff;
        background-size: cover 55px 48px;

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
        padding: 55px 55px 0 55px;
        background-color: #4fc1e9;
        border-right: 1px solid #20b1e8;
        height: 300px;
    }

    .block-type-1:first-child{
        padding-left: 100px;
    }

    .block-type-1:last-child{
        padding-right: 100px;
    }

    .reclean{
        height: 90px;
        padding-top: 80px;
        background: url("img/reclean.png") no-repeat center;
    }

    .reclean p{
        text-align: center;
        font-size: 12px;
        color: #c5f3ff;
    }

    .block-type-2{
        padding: 55px 55px;
        background-color: #2aa5d2;
        border-right: 1px solid #4fc1e9;
    }
    .block-type-2.extend-padding{
        padding: 77px 55px;
    }
    .cost-container-1{
        background: url("img/rub.png") no-repeat right;
        padding: 5px 50px 5px 0;
    }

    .cost-container-2{
        background: url("img/percent.png") no-repeat right;
        padding: 5px 50px 5px 0;
    }

    .cost{
        font-size: 50px;
        text-align: center;
        color: #ffffff;
    }

    .cost span{
        border-bottom: 1px solid #4fc1e9;
    }

    .cost-label{
        text-align: center;
        color: #ffffff;
        font-size: 12px;
        font-weight: 700;
    }

    .button{
        display: block;
        position: relative;
        margin: 0 auto;
        width: 260px;
        height: 55px;
        text-align: center;
        line-height: 50px;
        font-weight: 700;
        color: #ffffff;
        background-color: #394958;
        border: solid #0a2a36;
        border-width: 0 0 4px 0;
    }

    .button:hover{
        background-color: #223241;
        text-decoration: none;
        color: #ffffff;
    }

    .button.mod{
        padding-right: 50px;
        background-repeat: no-repeat;
        background-position: 224px center;
    }
    .button.mod:after{
        position: absolute;
        content: "";
        width: 1px;
        height: 55px;
        right: 50px;
        top: 0px;
        background-color: #2d3b48;
    }
    .button-save{
        background-image: url("img/save.png");
    }

    .button-print{
        background-image: url("img/print.png");
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
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 block-type-2">
                <div class="cost-container-1">
                    <div class="cost">
                        <span><?= ($orders->cost) ? Yii::$app->formatter->asDecimal($orders->cost, 0) : '...' ?></span>
                    </div>
                    <div class="cost-label">
                        Общая стоимость
                    </div>
                </div>
            </div>
            <div class="col-md-3 block-type-2">
                <div class="cost-container-2">
                    <div class="cost">
                        <span><?= ($orders->cost) ? Yii::$app->formatter->asDecimal($orders->costTotal, 0) : '...' ?></span>
                    </div>
                    <div class="cost-label">
                        Итого с учетом скидки
                    </div>
                </div>
            </div>
            <div class="col-md-6 block-type-2 extend-padding">
                <div class="col-md-6">
                    <?= Html::submitButton('Сохранить', ['class' => 'button mod button-save']) ?>
                </div>
                <div class="col-md-6">
                    <?= Html::a('Печатать', [''], ['class' => 'button mod button-print']) ?>
                </div>
            </div>
        </div>
    </div>
<? if ($action == 'update'): ?>
    <?= Html::a('Квитанция', ['ticket/update', 'id' => $orders->id], ['class' => 'btn btn-warning']) ?>
<? endif ?>
<?php ActiveForm::end() ?>

<div class="ticket-ajax-load"></div>