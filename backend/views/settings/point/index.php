<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Точки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="well clearfix">
    <a class="btn btn-success pull-right" href="<?= Url::to(['settings/point/new']) ?>">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
</div>
<? foreach ($point as $data): ?>
<div class="panel panel-default">
    <div class="panel-body">
        <a class="link-name" href="<?= Url::toRoute(['settings/point/update', 'id' => $data->id]); ?>"><?= $data->label ?></a>
        <div class="btn-group btn-group-sm pull-right">
            <a class="btn btn-warning" href="<?= Url::to(['settings/point/update', 'id' => $data->id]) ?>">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
            <a class="btn btn-danger" href="<?= Url::to(['settings/point/delete', 'id' => $data->id]) ?>">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </div>
    </div>
</div>
<? endforeach ?>

