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
<? Pjax::begin() ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'firstName'
        ],
        [
            'attribute' => 'secondName'
        ],
        [
            'attribute' => 'thirdName'
        ],
        [
            'attribute' => 'phone'
        ],
        [
            'attribute' => 'phoneHome'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['orders/new', 'id' => $model->id]);
                    },
            ],
        ],

    ],
]) ?>
<? Pjax::end() ?>