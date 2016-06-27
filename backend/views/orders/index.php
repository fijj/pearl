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
<div class="row">
    <div class="col-lg-12">
        <? Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id'
                ],
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
                    'attribute' => 'number'
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
                    'attribute' => 'statusId',
                    'value' => 'status.label',
                    'filter'=> \backend\models\settings\Status::dropDownArray()
                ],
                [
                    'attribute' => 'outDate',
                    'filter' => \yii\jui\DatePicker::widget([
                            'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',
                            'model' => $searchModel,
                            'attribute' => 'outDate',
                            'options' =>[
                                'class' => 'form-control'
                            ]
                        ]),
                    'value' => function($data){
                            return Yii::$app->formatter->asDate($data->outDate, 'php:d-m-Y');
                        }
                ],
                [
                    'format' => 'html',
                    'attribute' => 'clientId',
                    'value' => function($data){
                            return Html::a($data->clients->fullName, ['clients/view', 'id' => $data->clients->id]);
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
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', ['ticket/update', 'id' => $model->id]);
                            }
                    ],

                ],
            ],
        ]) ?>
        <? Pjax::end() ?>
    </div>
</div>

<style>
    .main-body.container{
        width: auto;
    }
</style>