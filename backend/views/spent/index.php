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
                    'attribute' => 'Общие расходы',
                    'format' => 'raw',
                    'value' => function($data){
                        foreach ($data->common->attributeLabels() as $key => $label){
                            $array[] = $label.' : <b>'.$data->common->getAttribute($key).'</b>';
                        }
                        return implode('<br />', $array);
                    }
                ],
                [
                    'attribute' => 'Расходы химчистка',
                    'format' => 'raw',
                    'value' => function($data){
                        foreach ($data->cleaner->attributeLabels() as $key => $label){
                            $array[] = $label.' : <b>'.$data->cleaner->getAttribute($key).'</b>';
                        }
                        return implode('<br />', $array);
                    }
                ],
                [
                    'attribute' => 'Расходы ковры',
                    'format' => 'raw',
                    'value' => function($data){
                        foreach ($data->carpet->attributeLabels() as $key => $label){
                            $array[] = $label.' : <b>'.$data->carpet->getAttribute($key).'</b>';
                        }
                        return implode('<br />', $array);
                    }
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