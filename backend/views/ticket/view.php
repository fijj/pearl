<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = $client->fullName;
$this->params['breadcrumbs'][] = [
    'label' => 'Клиенты',
    'url' => ['clients/index']
];

$this->params['breadcrumbs'][] = $this->title;
?>

<blockquote>
    <p><?= $client->fullName ?></p>
    <footer>Телефон: <?= $client->phone ?></footer>
    <footer>Домашний: <?= $client->phoneHome ?></footer>
    <footer>Всего заказов: <b><?= $orders['visits'] ?></b></footer>
    <footer>Сумма заказов: <b><?= $orders['total'] ?></b></footer>
    <footer>Сумма долгов: <b><?= $orders['debt'] ?></b></footer>
</blockquote>

<h3>На выдаче</h3>
<?= GridView::widget([
    'dataProvider' => $dataProvider['ready'],
    'tableOptions' => ['class' => 'table table-hover'],
    'rowOptions' => function ($model) {
            return ['onclick' => 'location.href = "'.Url::to(['orders/update', 'id' => $model->id]).'"'];
        },
    'columns' => [
        [
            'attribute' => 'date',
            'value' => function($data){
                    return Yii::$app->formatter->asDate($data->date, 'php:d-m-Y');
                },
        ],
        [
            'attribute' => 'number',
        ],
        [
            'attribute' => 'contract'
        ],
        [
            'attribute' => 'typeId',
            'value' => 'type.label',
            'filter' => \backend\models\settings\Type::dropDownArray()
        ],
        [
            'attribute' => 'pointId',
            'value' => 'point.label',
            'filter'=> \backend\models\settings\Point::dropDownArray()
        ],
        [
            'attribute' => 'outDate',
            'value' => function($data){
                    return Yii::$app->formatter->asDate($data->outDate, 'php:d-m-Y');
                }
        ],
        [
            'attribute' => 'cost',
        ],
        [
            'attribute' => 'debt',
            'value' => function($data){
                    return $data->debt();
                }
        ],
    ],
]) ?>

<hr><h3>В цеху</h3>
<?= GridView::widget([
    'dataProvider' => $dataProvider['workshop'],
    'tableOptions' => ['class' => 'table table-hover'],
    'rowOptions' => function ($model) {
            return ['onclick' => 'location.href = "'.Url::to(['orders/update', 'id' => $model->id]).'"'];
        },
    'columns' => [
        [
            'attribute' => 'date',
            'value' => function($data){
                    return Yii::$app->formatter->asDate($data->date, 'php:d-m-Y');
                },
        ],
        [
            'attribute' => 'number',
        ],
        [
            'attribute' => 'contract'
        ],
        [
            'attribute' => 'typeId',
            'value' => 'type.label',
            'filter' => \backend\models\settings\Type::dropDownArray()
        ],
        [
            'attribute' => 'pointId',
            'value' => 'point.label',
            'filter'=> \backend\models\settings\Point::dropDownArray()
        ],
        [
            'attribute' => 'outDate',
            'value' => function($data){
                    return Yii::$app->formatter->asDate($data->outDate, 'php:d-m-Y');
                }
        ],
        [
            'attribute' => 'cost',
        ],
        [
            'attribute' => 'debt',
            'value' => function($data){
                    return $data->debt();
                }
        ],
    ],
]) ?>

<hr><h3>Завершено</h3>
<?= GridView::widget([
    'dataProvider' => $dataProvider['history'],
    'tableOptions' => ['class' => 'table table-hover'],
    'rowOptions' => function ($model) {
            return ['onclick' => 'location.href = "'.Url::to(['orders/update', 'id' => $model->id]).'"'];
        },
    'columns' => [
        [
            'attribute' => 'date',
            'value' => function($data){
                    return Yii::$app->formatter->asDate($data->date, 'php:d-m-Y');
                },
        ],
        [
            'attribute' => 'number',
        ],
        [
            'attribute' => 'contract'
        ],
        [
            'attribute' => 'typeId',
            'value' => 'type.label',
            'filter' => \backend\models\settings\Type::dropDownArray()
        ],
        [
            'attribute' => 'pointId',
            'value' => 'point.label',
            'filter'=> \backend\models\settings\Point::dropDownArray()
        ],
        [
            'attribute' => 'outDate',
            'value' => function($data){
                    return Yii::$app->formatter->asDate($data->outDate, 'php:d-m-Y');
                }
        ],
        [
            'attribute' => 'cost',
        ],
        [
            'attribute' => 'debt',
            'value' => function($data){
                    return $data->debt();
                }
        ],
    ],
]) ?>

<style>
    tr{
        cursor: pointer;
    }
</style>