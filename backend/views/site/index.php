<?php
use yii\jui\AutoComplete;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\JsExpression;

$this->title = 'Поиск клиента';
?>
<div class="site-index">
    <?
    $form = ActiveForm::begin([
        'id' => 'client-search-form',
        'enableClientValidation' => true,
        'options' => ['class' => 'form-horizontal'],
        'action' => Url::to(['clients/new'])
    ])
    ?>
    <div class="row">
        <div class="col-lg-10">
        <?= Html::checkbox('123', '', ['label' => 'По номеру телефона', 'class' => 'search-option-checkbox']) ?>
        <?= $form->field($clients, 'fullName')->widget(AutoComplete::className(),[
            'model' => $clients,
            'attribute' => 'firstName',
            'clientOptions' => [
                'source' => Url::to(['clients/search']),
                'select' => new JsExpression("function( event, ui ) {
            window.location = 'index.php?r=orders/new&id=' + ui.item.id;
        }")
            ],
            'options' => [
                'class' => 'form-control clients-main-search',
            ],
        ])->label(false) ?>
        </div>
        <div class="col-lg-2">
            <?= Html::a('<span class= "glyphicon glyphicon-plus"></span>', ['clients/new']) ?>
            <!--<?= Html::submitButton('<span class= "glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-primary pull-right']) ?>-->
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
