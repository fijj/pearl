<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Менеджеры',
    'url' => Url::to(['settings/managers/index']),
];
if($action == "update"){
    $this->params['breadcrumbs'][] = [
        'label' => $model->managerName,
        'url' => Url::to(['/managers/view', 'id' => $model->id]),
    ];
}
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$form = ActiveForm::begin([
    'id' => 'managers-form',
    'options' => ['enctype' => 'multipart/form-data'],
])
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Карточка менеджера</h4>
                </div>
                <div class="panel-body">
                    <?= $form->field($model, 'managerName') ?>
                    <?= $form->field($model, 'managerPhone') ?>
                 </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Учетная запись</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $form->field($model, 'email') ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'password') ?>
                    <?= $form->field($model, 'access')->dropDownList($model->rulesArr) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>