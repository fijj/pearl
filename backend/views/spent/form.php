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
    'label' => 'Расходы',
    'url' => Url::to(['spent/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $spent->date,
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
        <div class="col-md-4">
            <?= $form->field($spent, 'date')->input('date', ['class' => 'datepicker form-control']) ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp1')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp2')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp3')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp4')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp5')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp6')->input('text', ['value' => '0.00']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp7')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp8')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp9')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp10')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($spent, 'sp11')->input('text', ['value' => '0.00']) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($spent, 'comment')->textarea() ?>
                </div>
            </div>
        </div>
    </div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>

<?php ActiveForm::end() ?>