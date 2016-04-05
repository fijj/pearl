<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Квитанция',
];

$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'ticket-form-1',
    //'options' => ['class' => 'form-inline'],
])
?>
<div class="row">
    <div class="col-md-12">
        <?= $form->field($model, 'caption')?>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <?= $form->field($model, 'marking')->dropDownList($model->markingArr)?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'wear')->dropDownList($model->wearArr)?>
    </div>
    <div class="col-md-2">
        <?= $form->field($model, 'color')?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-3">
                    <p class="sub-header">Фурнитура cъемная</p>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'param1')->checkbox()?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'param1n')->dropDownList($model->numberArr)->label(false)?>
                        </div>
                    </div>
                    <?= $form->field($model, 'param2')->checkbox()?>
                    <?= $form->field($model, 'param3')->checkbox()?>
                    <?= $form->field($model, 'param4')->checkbox()?>
                    <p class="sub-header">Фурнитура неcъемная</p>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'param5')->checkbox()?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'param5n')->dropDownList($model->numberArr)->label(false)?>
                        </div>
                    </div>
                    <?= $form->field($model, 'param6')->checkbox()?>
                    <?= $form->field($model, 'param7')->checkbox()?>
                    <?= $form->field($model, 'param8')->checkbox()?>
                    <?= $form->field($model, 'param9')->checkbox()?>
                    <?= $form->field($model, 'param10')->checkbox()?>
                    <?= $form->field($model, 'param11')->checkbox()?>
                    <?= $form->field($model, 'param12')->checkbox()?>
                    <?= $form->field($model, 'param13')->dropDownList($model->boolArr)?>
                    <?= $form->field($model, 'pollution')->dropDownList($model->pollutionArr)?>
                    <p class="sub-header">Предоставляемые услуги</p>
                    <?= $form->field($model, 'param72')->checkbox()?>
                    <?= $form->field($model, 'param73')->checkbox()?>
                    <?= $form->field($model, 'param74')->checkbox()?>
                    <?= $form->field($model, 'param75')->checkbox()?>
                    <?= $form->field($model, 'param76')->checkbox()?>
                    <?= $form->field($model, 'param77')->checkbox()?>
                </div>
                <div class="col-md-3">
                    <p class="sub-header">Дефекты изделия</p>
                    <?= $form->field($model, 'param14')->checkbox()?>
                    <?= $form->field($model, 'param15')->checkbox()?>
                    <?= $form->field($model, 'param16')->checkbox()?>
                    <?= $form->field($model, 'param17')->checkbox()?>
                    <?= $form->field($model, 'param18')->checkbox()?>
                    <?= $form->field($model, 'param19')->checkbox()?>
                    <?= $form->field($model, 'param20')->checkbox()?>
                    <?= $form->field($model, 'param21')->checkbox()?>
                    <?= $form->field($model, 'param22')->checkbox()?>
                    <?= $form->field($model, 'param23')->checkbox()?>
                    <?= $form->field($model, 'param24')->checkbox()?>
                    <?= $form->field($model, 'param25')->checkbox()?>
                    <?= $form->field($model, 'param26')->checkbox()?>
                    <?= $form->field($model, 'param27')->checkbox()?>
                    <?= $form->field($model, 'param28')->checkbox()?>
                    <?= $form->field($model, 'param29')->checkbox()?>
                    <?= $form->field($model, 'param30')->checkbox()?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'param31')->checkbox()?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($model, 'param31n')->dropDownList($model->numberArr)->label(false)?>
                        </div>
                    </div>
                    <?= $form->field($model, 'param32')->checkbox()?>
                    <?= $form->field($model, 'param33')->checkbox()?>
                    <?= $form->field($model, 'param34')->checkbox()?>
                </div>
                <div class="col-md-3">
                    <p class="sub-header">Пищевые пятна</p>
                    <?= $form->field($model, 'param35')->checkbox()?>
                    <?= $form->field($model, 'param36')->checkbox()?>
                    <?= $form->field($model, 'param37')->checkbox()?>
                    <?= $form->field($model, 'param38')->checkbox()?>
                    <?= $form->field($model, 'param39')->checkbox()?>
                    <?= $form->field($model, 'param40')->checkbox()?>
                    <?= $form->field($model, 'param41')->checkbox()?>
                    <?= $form->field($model, 'param42')->checkbox()?>
                    <?= $form->field($model, 'param43')->checkbox()?>
                    <?= $form->field($model, 'param44')->checkbox()?>
                    <?= $form->field($model, 'param45')->checkbox()?>
                    <p class="sub-header">Косметические пятна</p>
                    <?= $form->field($model, 'param63')->checkbox()?>
                    <?= $form->field($model, 'param64')->checkbox()?>
                    <?= $form->field($model, 'param65')->checkbox()?>
                    <?= $form->field($model, 'param66')->checkbox()?>
                    <p class="sub-header">Лекарственные пятна</p>
                    <?= $form->field($model, 'param67')->checkbox()?>
                    <?= $form->field($model, 'param68')->checkbox()?>
                    <?= $form->field($model, 'param69')->checkbox()?>
                    <?= $form->field($model, 'param70')->checkbox()?>
                </div>
                <div class="col-md-3">
                    <p class="sub-header">Бытовые пятна</p>
                    <?= $form->field($model, 'param46')->checkbox()?>
                    <?= $form->field($model, 'param47')->checkbox()?>
                    <?= $form->field($model, 'param48')->checkbox()?>
                    <?= $form->field($model, 'param49')->checkbox()?>
                    <?= $form->field($model, 'param50')->checkbox()?>
                    <?= $form->field($model, 'param51')->checkbox()?>
                    <?= $form->field($model, 'param52')->checkbox()?>
                    <?= $form->field($model, 'param53')->checkbox()?>
                    <?= $form->field($model, 'param54')->checkbox()?>
                    <?= $form->field($model, 'param55')->checkbox()?>
                    <?= $form->field($model, 'param56')->checkbox()?>
                    <?= $form->field($model, 'param57')->checkbox()?>
                    <?= $form->field($model, 'param58')->checkbox()?>
                    <?= $form->field($model, 'param59')->checkbox()?>
                    <?= $form->field($model, 'param60')->checkbox()?>
                    <?= $form->field($model, 'param61')->checkbox()?>
                    <?= $form->field($model, 'param62')->checkbox()?>
                    <?= $form->field($model, 'param71')->dropDownList($model->boolArr)?>
                    <?= $form->field($model, 'other')->textarea(['rows' => 5])?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Html::a('Печать', ['ticket/print', 'id' => $model->id]) ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right hidden-print']) ?>
<?php ActiveForm::end() ?>

<style>
    .sub-header{
        background-color: #337acb;
        padding: 5px;
        border-radius: 2px;
        color: white;
    }
</style>