<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */

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
    'min' => 1, // 0 or 1 (default 1)
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
        'param31n',
        'param32',
        'param33',
        'param34',
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
        'services'
    ],
]);
?>
    <div class="row container-ticket">
        <?php foreach ($model as $i => $item): ?>
            <div class="ticket col-md-12">
                <div class="block-header">
                    <h2 class="order">СПИСОК ТОВАРОВ/ОСНОВНЫЕ ПАРАМЕТРЫ
                        <div class="numeric"></div>
                        <i class="remove-ticket pull-right glyphicon glyphicon-remove"></i>
                    </h2>
                </div>
                <?php
                // necessary for update action.
                if (! $item->isNewRecord) {
                    echo Html::activeHiddenInput($item, "[{$i}]id");
                }
                ?>
                <div class="col-md-6 block-type-3">
                    <div class="col-md-4">
                        <?= $form->field($item, "[{$i}]caption")?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($item, "[{$i}]marking")->dropDownList($item->markingArr)?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($item, "[{$i}]color")?>
                    </div>
                </div>
                <div class="col-md-3 block-type-3">
                    <div class="col-md-6">
                        <?= $form->field($item, "[{$i}]wear")->dropDownList($item->wearArr)?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($item, "[{$i}]pollution")->dropDownList($item->pollutionArr)->label('Степень загр.')?>
                    </div>
                </div>
                <div class="col-md-3 block-type-3">
                    <div class="col-md-4">
                        <?= $form->field($item, "[{$i}]quantity")?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($item, "[{$i}]cost")?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($item, "[{$i}]discount")?>
                    </div>
                </div>
                <div class="row">
                    <!-- Пятна -->
                    <div class="accordion col-md-3">
                        <div class="sub-header">
                            <h2 class="s1">Пятна</h2>
                            <div class="collapse-btn"></div>
                        </div>
                        <?= $form->field($item, "[{$i}]param71")->dropDownList($item->boolArr)?>
                        <div class="type-container clearfix">
                            <div class="type-header">Пищевые пятна</div>
                            <div class="col-md-3">
                                <?= $form->field($item, "[{$i}]param35")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param36")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param37")->checkbox()?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($item, "[{$i}]param38")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param39")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param40")->checkbox()?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($item, "[{$i}]param41")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param42")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param43")->checkbox()?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($item, "[{$i}]param44")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param45")->checkbox()?>
                            </div>
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Бытовые пятна</div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param46")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param47")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param48")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param49")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param50")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param51")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param52")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param53")->checkbox()?>
                            </div>
                            <div class="col-md-6">
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
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Косметические пятна</div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param63")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param64")->checkbox()?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param65")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param66")->checkbox()?>
                            </div>
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Лекарственные пятна</div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param67")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param68")->checkbox()?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param69")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param70")->checkbox()?>
                            </div>
                        </div>
                    </div>

                    <!-- Фурнитура -->
                    <div class="accordion col-md-3">
                        <div class="sub-header">
                            <h2 class="s2">Фурнитура</h2>
                            <div class="collapse-btn"></div>
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Фурнитура cъемная</div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?= $form->field($item, "[{$i}]param1")->checkbox()?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($item, "[{$i}]param1n")->input('text', ['class' => 'form-control small-input'])->label(false)?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($item, "[{$i}]param2")->checkbox()?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param3")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param4")->checkbox()?>
                            </div>
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Фурнитура неcъемная</div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?= $form->field($item, "[{$i}]param5")->checkbox()?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($item, "[{$i}]param5n")->input('text', ['class' => 'form-control small-input'])->label(false)?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($item, "[{$i}]param6")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param7")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param8")->checkbox()?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param9")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param10")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param11")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param12")->checkbox()?>
                            </div>
                        </div>
                    </div>

                    <!-- Дефекты -->
                    <div class="accordion col-md-3">
                        <div class="sub-header">
                            <h2 class="s3">Дефекты</h2>
                            <div class="collapse-btn"></div>
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Дефекты изделия</div>
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($item, "[{$i}]param25")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param26")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param27")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param28")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param29")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param30")->checkbox()?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <?= $form->field($item, "[{$i}]param31")->checkbox()?>
                                    </div>
                                    <div class="col-md-4">
                                        <?= $form->field($item, "[{$i}]param31n")->input('text', ['class' => 'form-control small-input'])->label(false)?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $form->field($item, "[{$i}]param32")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param33")->checkbox()?>
                                        <?= $form->field($item, "[{$i}]param34")->checkbox()?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($item, "[{$i}]param13")->dropDownList($item->boolArr)?>
                                <?= $form->field($item, "[{$i}]other")->textarea(['rows' => 5])?>
                            </div>
                        </div>
                    </div>

                    <!-- Услуги -->
                    <div class="accordion col-md-3">
                        <div class="sub-header">
                            <h2 class="s4">Услуги</h2>
                            <div class="collapse-btn"></div>
                        </div>
                        <div class="type-container clearfix">
                            <div class="type-header">Предоставляемые услуги</div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param72")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param73")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param74")->checkbox()?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($item, "[{$i}]param75")->checkbox()?>
                                <?= $form->field($item, "[{$i}]param76")->checkbox()?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($item, "[{$i}]services")?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= Html::button('Добавить', ['class' => 'add-ticket button mod button-add']) ?>
        </div>
    </div>
<?php DynamicFormWidget::end(); ?>
<?php ActiveForm::end() ?>
