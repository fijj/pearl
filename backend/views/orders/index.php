<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Клиенты',
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-11">
    <? Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'date',
                'filterInputOptions' => ['class'=>'datepicker form-control'],
            ],
            [
                'attribute' => 'number'
            ],
            [
                'attribute' => 'typeId',
                'value' => 'type.label',
                'filter'=> \backend\models\settings\Type::dropDownArray()
            ],
            [
                'attribute' => 'pointId',
                'value' => 'point.label',
                'filter'=> \backend\models\settings\Point::dropDownArray()
            ],
            [
                'attribute' => 'statusId',
                'value' => 'status.label',
                'filter'=> \backend\models\settings\Status::dropDownArray()
            ],
            [
                'attribute' => 'outDate',
                'filterInputOptions' => ['class'=>'datepicker form-control'],
            ],
            [
                'format' => 'html',
                'attribute' => 'clientId',
                'value' => function($data){
                        return Html::a($data->clients->fullName, ['clients/update', 'id' => $data->clients->id]);
                    }
            ],
            [
                'class' => 'yii\grid\ActionColumn',

            ],

        ],
    ]) ?>

    <? Pjax::end() ?>
</div>