<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Логи',
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <? Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function ($model, $key, $index, $grid) {
                return [
                    'id' => $model->id,
                    'style' => "cursor: pointer",
                    'onclick' => 'location.href="'
                        . Yii::$app->urlManager->createUrl('event-logs/view')
                        . '&id="+(this.id);',
                ];
            },
            'tableOptions' => ['class' => 'table  table-bordered table-hover'],
            'columns' => [
                [
                    'attribute' => 'timestamp',
                    'filter' => \yii\jui\DatePicker::widget([
                        'language' => 'ru',
                        'dateFormat' => 'yyyy-MM-dd',
                        'model' => $searchModel,
                        'attribute' => 'timestamp',
                        'options' =>[
                            'class' => 'form-control'
                        ]
                    ]),
                ],
                [
                    'attribute' => 'managerId',
                    'value' => 'managers.managerName'
                ],
                [
                    'attribute' => 'data',
                    'format' => 'html',
                    'value' => function($data){
                        $array = unserialize($data->data);
                        $string = [
                            ($array['number']) ? "№ вещи: {$array['number']}<br />" : false,
                            ($array['contract']) ? "№ квитанции: {$array['contract']}<br />" : false,
                            ($array['firstName']) ? "Клиент: {$array['firstName']}<br />" : false,
                        ];
                        return implode($string);
                    },
                ],
                [
                    'attribute' => 'action',
                    'value' => function($data){
                        return $data->actionArr[$data->action];
                    },
                    'filter' => $searchModel->actionArr
                ],
                [
                    'attribute' => 'table'
                ],
                [
                    'attribute' => 'recordId'
                ],
            ],
        ]) ?>
        <? Pjax::end() ?>
    </div>
</div>
