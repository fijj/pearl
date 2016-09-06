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
    <div class="col-lg-2">
        <?= $form->field($model, 'mode')->dropDownList(Stats::$modeArr['label']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'type')->dropDownList(Type::dropDownArray(), ['prompt' => 'Все']) ?>
    </div>
    <div class="col-lg-2">
        <?= $form->field($model, 'point')->dropDownList(Point::dropDownArray(), ['prompt' => 'Все']) ?>
    </div>

    <div class="col-lg-3">
        <?= /**$form->field($model, 'interval')->dropDownList(Stats::$intervalArr['label'])**/null ?>
    </div>
    <?php ActiveForm::end() ?>

<div class="col-md-12">
    <div class="btn-group btn-group-xs" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="radio" name="chart-type" data-value="column" id="option1" autocomplete="off" checked> column
        </label>
        <label class="btn btn-default">
            <input type="radio" name="chart-type" data-value="line" id="option2" autocomplete="off"> line
        </label>
        <label class="btn btn-default">
            <input type="radio" name="chart-type" data-value="area" id="option3" autocomplete="off"> area
        </label>
    </div>

    <div class="btn-group btn-group-xs" data-toggle="buttons">
        <label class="btn btn-default active">
            <input type="radio" name="chart-aprox" data-value="day" id="option4" autocomplete="off" checked> по дням
        </label>
        <label class="btn btn-default">
            <input type="radio" name="chart-aprox" data-value="week" id="option5" autocomplete="off"> по неделям
        </label>
        <label class="btn btn-default">
            <input type="radio" name="chart-aprox" data-value="month" id="option6" autocomplete="off"> по месяцам
        </label>
        <label class="btn btn-default">
            <input type="radio" name="chart-aprox" data-value="year" id="option7" autocomplete="off"> по годам
        </label>
    </div>
</div>

<div id="highchart-container" style="height: 600px"></div>

<div class="table-container">
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th class="head-helper"></th>
                <? foreach ($monthArr as $month): ?>
                    <th>
                        <?= $month; ?>
                    </th>
                <? endforeach ?>
            </tr>
        </thead>
        <tbody>
                <? foreach ($stats as $item): ?>
                    <tr>
                        <td class="head-column"><?= $item['label'] ?></td>
                        <? foreach ($item['values'] as $key => $val): ?>

                                <td>
                                    <? if($val['sum']): ?>
                                        <?=Yii::$app->formatter->asDecimal($val['sum'], 2) ?>
                                        <? $diff = $val['sum'] - $item['values'][$key - 1]['sum'] ?>
                                        <? if ($diff > 0): ?>
                                            <p class ="diff diff-plus">+<?= Yii::$app->formatter->asDecimal($diff, 2) ?></p>
                                        <? else: ?>
                                            <p class ="diff diff-minnus"><?= Yii::$app->formatter->asDecimal($diff, 2) ?></p>
                                        <? endif ?>
                                    <? endif ?>

                                </td>
                        <? endforeach; ?>
                    </tr>
                <? endforeach ?>


                <tr style="border-top: solid 2px">
                    <td class="head-column" style="border-top: solid 2px"><?= $spent[0]->common->modelLabel ?></td>
                    <? foreach ($spent as $item): ?>
                        <td><?= Yii::$app->formatter->asDecimal($item->common->total, 2) ?></td>
                    <? endforeach ?>
                </tr>

                <tr>
                    <td class="head-column"><?= $spent[0]->cleaner->modelLabel ?></td>
                    <? foreach ($spent as $item): ?>
                        <td><?= Yii::$app->formatter->asDecimal($item->cleaner->total, 2) ?></td>
                    <? endforeach ?>
                </tr>

                <tr>
                    <td class="head-column"><?= $spent[0]->carpet->modelLabel ?></td>
                    <? foreach ($spent as $item): ?>
                        <td><?= Yii::$app->formatter->asDecimal($item->carpet->total, 2) ?></td>
                    <? endforeach ?>
                </tr>

                <tr style="border-top: solid 2px">
                    <td class="head-column" style="border-top: solid 2px">Новых клиентов</td>
                    <? foreach ($clients as $key => $client): ?>
                        <td>
                            <?= $client['count'] ?>
                            <? $diff = $client['count'] - $clients[$key - 1]['count'] ?>
                            <? if ($diff > 0): ?>
                                <p class ="diff diff-plus">+<?= $diff ?></p>
                            <? else: ?>
                                <p class ="diff diff-minnus"><?= $diff ?></p>
                            <? endif ?>
                        </td>
                    <? endforeach ?>
                </tr>

                <tr>
                    <td class="head-column">
                        <b>Клиентов с повторными визитами:</b>
                    </td>
                </tr>

                <? foreach ($visits as $item): ?>
                    <tr>
                        <td class="head-column"><?= $item['label'] ?></td>
                        <? foreach ($item['values'] as $key => $val): ?>

                            <td>
                                <? if($val['count']): ?>
                                    <?= $val['count'] ?>
                                    <? $diff = $val['count'] - $item['values'][$key - 1]['count'] ?>
                                    <? if ($diff > 0): ?>
                                        <p class ="diff diff-plus">+<?= $diff ?></p>
                                    <? else: ?>
                                        <p class ="diff diff-minnus"><?= $diff ?></p>
                                    <? endif ?>
                                <? endif ?>

                            </td>
                        <? endforeach; ?>
                    </tr>
                <? endforeach ?>
        </tbody>
    </table>
</div>
<script>
    var data = <?= $data ?>;
    var label = '<?= $label ?>';
</script>
<style>
    .table-container{
        position: relative;
    }

    .table{
        margin-top: 125px;
        overflow: auto;
        font-size: 12px;
        display: block;
        vertical-align: middle;
    }

    tr{
        height: 45px;
    }

    th{
        width: 130px;
        text-align: center;
    }

    td{
        text-align: center;
    }

    .head-column{
        position: absolute;
        background-color: white;
        width: 150px;
        height: 46px;
        border-right: 2px solid;
        margin-top: -2px;
    }

    .head-helper{
        display: block;
        width: 150px;
        height: 46px;
    }

    .container{
        width: 100%;
    }

    .demo-placeholder {
        width: 100%;
        height: 600px;
        font-size: 14px;
        line-height: 1.2em;
    }

    i.glyphicon{
        display: inline;
        float: right;
    }

    .diff{
        font-size: 9px;
        opacity: 0.2;
    }

    .diff-plus{
        color: green;
    }

    .diff-minnus{
        color: red;
    }

    tr:hover .diff{
        opacity: 1;
    }
</style>