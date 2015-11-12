<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="well clearfix">
    <a class="btn btn-success pull-right" href="<?= Url::to(['tasks/new']) ?>">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
</div>

<div class="col-lg-12">
    <? Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'date',
                'filter' => \yii\jui\DatePicker::widget([
                        'language' => 'ru',
                        'dateFormat' => 'yyyy-MM-dd',
                        'model' => $searchModel,
                        'attribute' => 'date',
                        'options' =>[
                            'class' => 'form-control'
                        ]
                    ]),
                'value' => function($data){
                        return Yii::$app->formatter->asDate($data->date, 'php:d-m-Y');
                    },
            ],
            [
                'attribute' => 'title'
            ],
            [
                'attribute' => 'type',
                'value' => function($data){
                        return $data->typeArr[$data->type];
                    },
                'filter' => $searchModel->typeArr
            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                        return $data->statusArr[$data->status];
                    },
                'filter'=> $searchModel->statusArr
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function(){return false;}
                ],


            ],

        ],
    ]) ?>
    <? Pjax::end() ?>
</div>

