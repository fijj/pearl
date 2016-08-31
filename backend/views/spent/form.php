<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Расходы',
    'url' => Url::to(['spent/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $spentRelation->date,
    ];
}else{
    $this->params['breadcrumbs'][] = [
        'label' => 'Новые',
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'spent-form',
])
?>
    <div class="row">
        <div class="col-md-2">
            <?= $form->field($spentRelation, 'date')->input('date', ['class' => 'datepicker form-control']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3>Общие расходы</h3>
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($spentCommon, 'materials') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($spentCommon, 'advertising_online') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($spentCommon, 'advertising_offline') ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($spentCommon, 'other') ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($spentCommon, 'comment')->textarea() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Расходы химчистка</h3>
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($spentCleaner, 'pay') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCleaner, 'tax') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCleaner, 'rent') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCleaner, 'chemicals') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCleaner, 'reward') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCleaner, 'other') ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($spentCleaner, 'comment')->textarea() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3>Расходы ковры</h3>
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?= $form->field($spentCarpet, 'pay') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCarpet, 'tax') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCarpet, 'rent') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCarpet, 'chemicals') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCarpet, 'reward') ?>
                        </div>
                        <div class="col-md-4">
                            <?= $form->field($spentCarpet, 'other') ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($spentCarpet, 'comment')->textarea() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

<?php ActiveForm::end() ?>