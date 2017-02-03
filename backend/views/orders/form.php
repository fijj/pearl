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
])
?>
<style>
    .red{
        color: red;
    }
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

    input.form-control.small-input{
        width: 25px;
        height: 25px;
        padding: 4px;
        border: 1px solid #4fc1e9;
    }

    select.form-control{
        overflow: hidden;
        background: url("img/arrow.png") no-repeat right #ffffff;
    }

    .datepicker{
        overflow: hidden;
        background: url("img/date.png") no-repeat right #ffffff;
    }

    .block-header{
        height: 90px;
        padding: 30px 100px;
        background-color: #394958;
    }

    .numeric {
        position: absolute;
        right: 50px;
        top: 47px;
        width: 70px;
        height: 70px;
        font-size: 40px;
        line-height: 68px;
        border-radius: 100%;
        text-align: center;
        z-index: 10;
        background-color: #8bc34a;
        color: white;
        -webkit-box-shadow: 0px 0px 9px 0px rgba(50, 50, 50, 0.31);
        -moz-box-shadow: 0px 0px 9px 0px rgba(50, 50, 50, 0.31);
        box-shadow: 0px 0px 9px 0px rgba(50, 50, 50, 0.31);
    }

    .block-header i{
        line-height: 30px;
        cursor: pointer;
        position: absolute;
        right: 40px;
        top: 20px;
    }

    .block-header h2.order{
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
        height: 210px;
        padding: 55px 55px;
        background-color: #2aa5d2;
        border-right: 1px solid #4fc1e9;
    }

    .block-type-2.extend-padding{
        padding: 40px 55px;
    }

    .cost-container-1{
        background: url("img/rub.png") no-repeat right;
        padding: 5px 50px 5px 0;
    }

    .cost-container-2{
        background: url("img/percent.png") no-repeat right;
        padding: 5px 50px 5px 0;
    }

    .cost-container-3{
        background: url("img/debt.png") no-repeat right;
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
        margin-top: -16px;
        background-image: url("img/save.png");
    }

    .button-print{
        margin-top: 20px;
        background-image: url("img/print.png");
    }

    .button-add{
        background-image: url("img/add.png");
        margin: 50px auto;
    }
    /*********************/
    .container-ticket{
        background-color: #f2f2f2;
        padding-bottom: 50px;
    }
    .container-ticket label {
        color: #666;
    }

    .ticket{
        margin-top: 25px;
    }

    .container-ticket .form-control {
        border: 1px solid #c6c6c6;
    }

    .accordion{
        height: 83px;
    }

    .accordion.open{
        height: auto;
    }

    .block-type-3{
        min-height: 200px;
        max-height: 286px;
        padding: 55px 55px;
        background-color: white;
        border-right: 1px solid #eaeaea;
    }

    .block-type-3.extend-padding{
        padding: 77px 55px;
    }

    .bt-3-placeholder{
        height: 176px;
    }
    .accordion{
        padding-right: 5px;
        padding-left: 5px;
    }
    .accordion:first-child{
        padding-left: 15px;
    }

    .accordion:last-child{
        padding-right: 15px;
    }
    .sub-header{
        padding: 10px 0 10px 25%;
        background-color: #2598c2;
    }

    .sub-header h2{
        padding: 20px 70px;
        font-size: 21px;
        color: white;
    }

    .sub-header h2.s1{
        background: url("img/10.png") no-repeat left;
    }

    .sub-header h2.s2{
        background: url("img/20.png") no-repeat left;
    }

    .sub-header h2.s3{
        background: url("img/30.png") no-repeat left;
    }

    .sub-header h2.s4{
        background: url("img/40.png") no-repeat left;
    }

    .collapse-btn{
        position: absolute;
        right: 50px;
        top: 25px;
        height: 35px;
        width: 35px;
        border-radius: 100%;
        background-color: rgb(79, 193, 233);
        cursor: pointer;
    }

    .collapse-btn:before{
        content: "+";
        position: absolute;
        font-size: 28px;
        color: #ffffff;
        left: 9px;
        top: -3px;
    }

    .collapse-btn.open:before{
        content: "-";
        left: 13px;
        top: -5px;
    }

    .collapse-btn:after{
        content: '';
        position: absolute;
        width: 1px;
        height: 30px;
        top: 2px;
        right: 70px;
        background-color: #2aa5d2;
    }

    .type-container{
        background-color: white;
        margin-top: 5px;
        padding-bottom: 10px;
        font-size: 11px;
    }
    .type-container .form-group {
        margin: 0;
    }

    .type-container .help-block {
        margin: 0;
    }

    .type-header{
        margin-bottom: 15px;
        padding: 15px 0 15px 0;
        background-color: #4fc1e9;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
        color: white;
    }

    input[type=checkbox] {
        position:absolute; z-index:-1000; left:-1000px; overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
    }

    input[type=checkbox] + label.css-label {
        padding-left:20px;
        height:15px;
        display:inline-block;
        line-height:15px;
        background-repeat:no-repeat;
        background-position: 0 0;
        font-size:15px;
        vertical-align:middle;
        cursor:pointer;

    }

    input[type=checkbox]:checked + label.css-label {
        background-position: 0 -15px;
    }
    label.css-label {
        background-image:url('img/chekbox.png');
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    .field-orders-bank_card{
        margin-top: 32px;
    }
    @media (min-width: 992px) {
        .block-type-1{
            padding: 55px 10px 55px 10px;
        }

        .block-type-1:first-child {
            padding-left: 10px;
        }

        .block-type-1:last-child {
            padding-right: 10px;
        }
        .block-type-2{
            padding: 55px 30px 55px 0px;
        }
        .cost-container{
            padding: 5px 90px 5px 0px;
        }
        .button.mod{
            width: 200px;
            background-position: 163px center;
        }
        .block-type-3{
            padding: 55px 10px;
        }
        .block-type-3 label{
            font-size: 12px;
        }
        .sub-header{
            padding: 10px 0 10px 5%;
        }
        .collapse-btn{
            right: 30px;
        }

        .type-container {
            font-size: 10.4px;
        }
        .type-container > .col-md-3, .type-container > .col-md-6{
            padding-left: 5px;
            padding-right: 1px;
        }
        input[type=checkbox] + label.css-label {
            padding-left: 15px;
        }
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header">
                <h2 class="order">КВИТАНЦИЯ</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 block-type-1">
                <?= $form->field($orders, 'date')->input('date', ['class' => 'datepicker form-control']) ?>
                <?= $form->field($orders, 'outDate')->input('date', ['class' => 'datepicker form-control']) ?>
            </div>
            <div class="col-md-3 block-type-1">
                <?= $form->field($orders, 'pointId')->dropDownList(Point::dropDownArray()) ?>
                <? if ($action == 'update'): ?>
                    <?= $form->field($orders, 'typeId')->dropDownList(Type::dropDownArray(), ['disabled' => '']) ?>
                <? else: ?>
                    <?= $form->field($orders, 'typeId')->dropDownList(Type::dropDownArray(), ['prompt'=>'Тип услуги']) ?>
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
            <div class="col-md-2 block-type-1">
                <?= $form->field($orders, 'deliveryCost') ?>
                <?= $form->field($orders, 'paid') ?>
                <?= $form->field($orders, 'bank_card')->checkbox(['class' => 'bank']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 block-type-2">
                <div class="cost-container cost-container-1">
                    <div class="cost" data-type="cost">
                        <span><?= ($orders->cost) ? Yii::$app->formatter->asDecimal($orders->cost, 0) : '...' ?></span>
                    </div>
                    <div class="cost-label">
                        Общая стоимость
                    </div>
                </div>
            </div>
            <div class="col-md-3 block-type-2">
                <div class="cost-container cost-container-2">
                    <div class="cost">
                        <span><?= ($orders->costTotal) ? Yii::$app->formatter->asDecimal($orders->costTotal, 0) : '...' ?></span>
                    </div>
                    <div class="cost-label">
                        Итого с учетом скидки<br />(для пункта приема)
                    </div>
                </div>
            </div>
            <div class="col-md-6 block-type-2">
                <div class="col-md-6">
                    <div class="cost-container cost-container-3">
                        <div class="cost">
                            <span class="<?= ($orders->debt != 0) ? 'red' : '' ?>"><?= ($orders->debt) ? Yii::$app->formatter->asDecimal($orders->debt, 0) : '...' ?></span>
                        </div>
                        <div class="cost-label">
                            Задолженность
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= Html::submitButton('Сохранить', ['class' => 'button mod button-save']) ?>
                    <?= Html::a('Печатать', ['ticket/print', 'id' => $orders->id], ['class' => 'button mod button-print']) ?>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end() ?>

<div class="ticket-ajax-load">
    <? if($action == 'update' || $action == 'reception'): ?>
        <?= $this->render('@backend/views/ticket/form/'.$template,[
            'model' => $model
        ]); ?>
    <? endif; ?>
</div>

<script>
    var xxxAction = '<?= $action ?>';
</script>