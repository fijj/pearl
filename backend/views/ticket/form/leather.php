<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'] = [
    ['label' => 'Заказы', 'url' => ['orders/index']],
    ['label' => $order->number, 'url' => ['orders/update', 'id' => $order->id]],
    ['label' => 'Квитанция'],
];

$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'ticket-form',
    //'options' => ['class' => 'form-inline'],
])
?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper_ticket', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-ticket', // required: css class selector
    'widgetItem' => '.ticket', // required: css class
    'limit' => 999, // the maximum times, an element can be cloned (default 999)
    'min' => 0, // 0 or 1 (default 1)
    'insertButton' => '.add-ticket', // css class
    'deleteButton' => '.remove-ticket', // css class
    'model' => $model[0],
    'formId' => 'ticket-form',
    'formFields' => [
        'caption',
        'orderId',
        'clientId',
        'caption',
        'marking',
        'wear',
        'color',
        'param1',
        'param1n',
        'param2',
        'param3',
        'param4',
        'param5',
        'param5n',
        'param6',
        'param7',
        'param8',
        'param9',
        'param10',
        'param11',
        'param12',
        'param13',
        'pollution',
        'param14',
        'param15',
        'param16',
        'param17',
        'param18',
        'param19',
        'param20',
        'param21',
        'param22',
        'param23',
        'param24',
        'param25',
        'param26',
        'param27',
        'param28',
        'param29',
        'param30',
        'param31',
        'param32',
        'param33',
        'param34',
        'param34_1',
        'param34_2',
        'param34_3',
        'param34_4',
        'param34_5',
        'param34_6',
        'param34_7',
        'param34_8',
        'param34_9',
        'param34_10',
        'param34_11',
        'param34_12',
        'param34_13',
        'param34_14',
        'param34_14n',
        'param34_15',
        'param34_16',
        'param34_17',
        'param34_18',
        'param34_19',
        'other',
        'param35',
        'param36',
        'param37',
        'param38',
        'param39',
        'param40',
        'param41',
        'param42',
        'param43',
        'param44',
        'param45',
        'param46',
        'param47',
        'param48',
        'param49',
        'param50',
        'param51',
        'param52',
        'param53',
        'param54',
        'param55',
        'param56',
        'param57',
        'param58',
        'param59',
        'param60',
        'param61',
        'param62',
        'param63',
        'param64',
        'param65',
        'param66',
        'param67',
        'param68',
        'param69',
        'param70',
        'param71',
        'param72',
        'param73',
        'param74',
        'param75',
        'param76',
        'param77',
        'cost',
        'discount',
        'services',
        'salinity'
    ],
]);
?>
    <div class="container-ticket">
        <?php foreach ($model as $i => $item): ?>
        <div class="ticket col-md-4">
            <?php
            // necessary for update action.
            if (! $item->isNewRecord) {
                echo Html::activeHiddenInput($item, "[{$i}]id");
            }
            ?>
            <button type="button" class="remove-ticket btn btn-danger btn-xs pull-right"><i class="glyphicon glyphicon-minus"></i></button>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($item, "[{$i}]caption")?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($item, "[{$i}]marking")->dropDownList($item->markingArr)?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($item, "[{$i}]wear")->dropDownList($item->wearArr)?>
                </div>
                <div class="col-md-5">
                    <?= $form->field($item, "[{$i}]color")?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($item, "[{$i}]cost")?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($item, "[{$i}]discount")?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($item, "[{$i}]services")?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="accordion">
                                <p class="sub-header">Фурнитура cъемная</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= $form->field($item, "[{$i}]param1")->checkbox()?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($item, "[{$i}]param1n")->dropDownList($item->numberArr)->label(false)?>
                                    </div>
                                </div>
                                <?= $form->field($item, "[{$i}]param2")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param3")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param4")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Фурнитура неcъемная</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= $form->field($item, "[{$i}]param5")->checkbox()?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($item, "[{$i}]param5n")->dropDownList($item->numberArr)->label(false)?>
                                    </div>
                                </div>
                                <?= $form->field($item, "[{$i}]param6")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param7")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param8")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param9")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param10")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param11")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param12")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Дефекты изделия</p>
                                <?= $form->field($item, "[{$i}]param14")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param15")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param16")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param17")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param18")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param19")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param20")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param21")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param22")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param23")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param24")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param25")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param26")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param27")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param28")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param29")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param30")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param32")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param33")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_1")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_2")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_3")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_4")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_5")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_6")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_7")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_8")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_9")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_10")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_11")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_12")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_13")->checkbox()?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= $form->field($item, "[{$i}]param34_14")->checkbox()?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($item, "[{$i}]param34_14n")->dropDownList($item->numberArr)->label(false)?>
                                    </div>
                                </div>
                                <?= $form->field($item, "[{$i}]param34_15")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_16")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_17")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_18")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param34_19")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Пищевые пятна</p>
                                <?= $form->field($item, "[{$i}]param35")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param36")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param37")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param38")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param39")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param40")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param41")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param42")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param43")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param44")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param45")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Бытовые пятна</p>
                                <?= $form->field($item, "[{$i}]param46")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param47")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param48")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param49")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param50")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param51")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param52")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param53")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param54")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param55")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param56")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param57")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param58")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param59")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param60")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param61")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param62")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Косметические пятна</p>
                                <?= $form->field($item, "[{$i}]param63")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param64")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param65")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param66")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Лекарственные пятна</p>
                                <?= $form->field($item, "[{$i}]param67")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param68")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param69")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param70")->checkbox()?>
                            </div>
                            <div class="accordion">
                                <p class="sub-header">Предоставляемые услуги</p>
                                <?= $form->field($item, "[{$i}]param72")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param73")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param74")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param75")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param76")->checkbox()?>
                            </div>
                            <?= $form->field($item, "[{$i}]param13")->dropDownList($item->boolArr)?>
                            <?= $form->field($item, "[{$i}]pollution")->dropDownList($item->pollutionArr)?>
                            <?= $form->field($item, "[{$i}]salinity")->dropDownList($item->salinityArr)?>
                            <?= $form->field($item, "[{$i}]param71")->dropDownList($item->boolArr)?>
                            <?= $form->field($item, "[{$i}]other")->textarea(['rows' => 5])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? endforeach ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button style="display: block; width: 100%; margin-bottom: 10px" type="button" class="add-ticket btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
    </div>
<?php DynamicFormWidget::end(); ?>
<div class="row">
    <div class="col-md-12">
        <?= Html::a('<i class ="glyphicon glyphicon-print"></i>', ['ticket/print', 'id' => $item->orderId], ['class' => 'ticket-print-btn', 'target' => '_blank']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right hidden-print']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>

<style>
    .sub-header{
        background-color: #337acb;
        padding: 5px;
        border-radius: 2px;
        color: white;
    }
    .ticket-print-btn{
        font-size: 36px;
    }

</style>