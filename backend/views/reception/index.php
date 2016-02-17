<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Приемка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scanner-header">
    <?= Html::img('img/scan.png', ['class' => 'scanner blink']) ?>

    <?
    $form = ActiveForm::begin([
        'id' => 'reception-form',
        'options' => ['class' => 'form-inline'],
    ]);
    ?>
    <?= $form->field($model, 'code')->textInput(['autofocus' => 'autofocus', 'autocomplete' => 'off'])->label(false)?>
    <?php ActiveForm::end() ?>
</div>

<div class="result"></div>