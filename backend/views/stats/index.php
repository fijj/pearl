<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\FlotAsset;
use yii\bootstrap\ActiveForm;
use backend\models\Stats;
use backend\models\settings\Point;
use backend\models\settings\Type;
FlotAsset::register($this);

/* @var $this yii\web\View */

$this->title = 'Статистика';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="chart-btn-container clearfix">
    <?
    $form = ActiveForm::begin([
        'id' => 'stats-form',
        'method' => 'get',
        'action' => Url::to(['stats/index'])
    ])
    ?>
    <div class="col-lg-3">
        <?= $form->field($model, 'mode')->dropDownList(Stats::$modeArr['label']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'type')->dropDownList(Type::dropDownArray(), ['prompt' => 'Все']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'point')->dropDownList(Point::dropDownArray(), ['prompt' => 'Все']) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'interval')->dropDownList(Stats::$intervalArr['label']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>

<div id="placeholder" class="demo-placeholder"></div>
<script>
    var data = <?= $data ?>;
    var label = '<?= $label ?>';
</script>
<style>
    .container{
        width: 100%;
    }
    .demo-placeholder {
        width: 100%;
        height: 600px;
        font-size: 14px;
        line-height: 1.2em;
    }
</style>