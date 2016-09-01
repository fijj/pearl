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

<div class="col-md-12">
    <div class="btn-group btn-group-xs" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="chart-type" data-value="column" id="option1" autocomplete="off" checked> column
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="chart-type" data-value="line" id="option2" autocomplete="off"> line
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="chart-type" data-value="area" id="option3" autocomplete="off"> area
        </label>
    </div>

    <div class="btn-group btn-group-xs" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="chart-aprox" data-value="day" id="option4" autocomplete="off" checked> по дням
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="chart-aprox" data-value="week" id="option5" autocomplete="off"> по неделям
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="chart-aprox" data-value="month" id="option6" autocomplete="off"> по месяцам
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="chart-aprox" data-value="year" id="option7" autocomplete="off"> по годам
        </label>
    </div>
</div>
<div class="chart-btn-container clearfix">

<!--<div id="placeholder" class="demo-placeholder"></div>-->
<div id="highchart-container" style="height: 600px"></div>
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