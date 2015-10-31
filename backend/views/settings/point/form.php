<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Точки',
    'url' => Url::to(['settings/point/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $point->label,
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'point-form',
])
?>

<?= $form->field($point, 'label') ?>
<?= $form->field($point, 'discount') ?>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>
<?php ActiveForm::end() ?>