<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\Sortable;

/* @var $this yii\web\View */

$this->title = 'Приемка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <?
                echo Sortable::widget([
                    'items' => $orders,
                    'options' => [
                        'id' => 'sort1',
                        'class' => 'connectedSortable',
                        'tag' => 'ul',
                        'data-status' => '1'
                    ],
                    'itemOptions' => ['tag' => 'li'],
                    'clientOptions' => ['cursor' => 'move'],
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <?
                echo Sortable::widget([
                    'items' => $orders,
                    'options' => [
                        'id' => 'sort2',
                        'class' => 'connectedSortable',
                        'tag' => 'ul',
                        'data-status' => '2'
                    ],
                    'itemOptions' => ['tag' => 'li'],
                    'clientOptions' => ['cursor' => 'move'],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>