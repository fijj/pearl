<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\models\settings\Point;
use backend\models\settings\Status;
use backend\models\settings\Type;

/* @var $this yii\web\View */


$this->title = $model->recordId;
$this->params['breadcrumbs'][] = [
    'label' => 'Логи',
    'url' => Url::to(['event-logs/index']),
];

$this->params['breadcrumbs'][] = $this->title;
?>
<? $array = unserialize($model->data) ?>
<? if(count($array) != 2): ?>
    <div class="row">
        <div class="col-md-12">
            <? foreach ($array as $key => $value): ?>
                <p><?= $key ?> => <?= $value ?></p>
            <? endforeach; ?>
        </div>
    </div>
<? else: ?>
    <div class="row">
        <div class="col-md-6">
            <? foreach ($array[0] as $key => $value): ?>
                <p><?= $key ?> => <?= $value ?></p>
            <? endforeach; ?>
        </div>
        <div class="col-md-6">
            <? foreach ($array[1] as $key => $value): ?>
                <? if($array[0][$key] != $value): ?>
                    <p class="red"><?= $key ?> => <?= $value ?></p>
                <? else: ?>
                    <p><?= $key ?> => <?= $value ?></p>
                <? endif ?>
            <? endforeach; ?>
        </div>
    </div>
<? endif ?>

<style>
    .red{
        color: red;
    }
</style>
