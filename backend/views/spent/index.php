<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Расходы',
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="well clearfix">
    <a class="btn btn-success pull-right" href="<?= Url::to(['spent/create']) ?>">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
</div>
<div class="row">
    <div class="col-lg-12">
        <? Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'date',
                    'value' => function($data){
                            return Yii::$app->formatter->asDate($data->date, 'php:M Y');
                        },
                ],
                [
                    'attribute' => 'sp1'
                ],
                [
                    'attribute' => 'sp2'
                ],
                [
                    'attribute' => 'sp3'
                ],
                [
                    'attribute' => 'sp4'
                ],
                [
                    'attribute' => 'sp5'
                ],
                [
                    'attribute' => 'sp6'
                ],
                [
                    'attribute' => 'sp7'
                ],
                [
                    'attribute' => 'sp8'
                ],
                [
                    'attribute' => 'sp9'
                ],
                [
                    'attribute' => 'sp10'
                ],
                [
                    'attribute' => 'sp11'
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
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