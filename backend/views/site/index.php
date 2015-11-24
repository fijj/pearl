<?php
use yii\jui\AutoComplete;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\JsExpression;

$this->title = 'Поиск клиента';
$total = [];
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
        <div class="col-lg-11">
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
        <div class="col-lg-1">
            <?= Html::a('<span class= "glyphicon glyphicon-plus"></span>', ['clients/new']) ?>
            <!--<?= Html::submitButton('<span class= "glyphicon glyphicon-plus"></span>', ['class' => 'btn btn-primary pull-right']) ?>-->
        </div>
    </div>
    <?php ActiveForm::end() ?>

    <div class="row">
        <div class="tasks-container panel panel-default">
            <div class="panel-body">
                <? foreach($tasks as $data): ?>
                    <blockquote>
                        <p>
                           <? if ($data->type == 0): ?>

                           <? elseif ($data->type == 1): ?>
                                <span class="glyphicon glyphicon-star"></span>
                           <? elseif ($data->type == 2): ?>
                                <span class="blink glyphicon glyphicon-eye-open"></span>
                           <? endif ?>
                           <span class="task-date"><?= $data->date ?></span>
                        </p>
                        <p><?= $data->title ?></p>
                        <footer><?= $data->message ?></footer>
                    </blockquote>
                <? endforeach ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Статистик</th>
                            <th colspan="2">Сегодня</th>
                            <th colspan="2">Вчера</th>
                            <? if(Yii::$app->user->identity->access > 50): ?>
                                <th colspan="2">Текущий месяц</th>
                                <th colspan="2">Предыдущий месяц</th>
                            <? endif ?>
                            <th>Долг</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Человек</th>
                            <th>Денег</th>
                            <th>Человек</th>
                            <th>Денег</th>
                            <? if(Yii::$app->user->identity->access > 50): ?>
                                <th>Человек</th>
                                <th>Денег</th>
                                <th>Человек</th>
                                <th>Денег</th>
                            <? endif ?>
                            <th></th>
                        </tr>
                    </thead>
                    <? foreach ($stats as $data): ?>
                        <tr>
                            <td><?= $data['point'] ?></td>
                            <td><?= $data['peopleToday'] ?></td>
                            <td><?= $data['profitToday'] ?></td>
                            <td><?= $data['peopleTomorrow'] ?></td>
                            <td><?= $data['profitTomorrow'] ?></td>
                            <? if(Yii::$app->user->identity->access > 50): ?>
                                <td><?= $data['peopleThisMonth'] ?></td>
                                <td><?= $data['profitThisMonth'] ?></td>
                                <td><?= $data['peoplePrevMonth'] ?></td>
                                <td><?= $data['profitPrevMonth'] ?></td>
                            <? endif ?>
                            <td><?= $data['debt'] ?></td>
                        </tr>
                        <?
                        //Итого
                            $total['peopleToday'] += $data['peopleToday'];
                            $total['profitToday'] += $data['profitToday'];
                            $total['peopleTomorrow'] += $data['peopleTomorrow'];
                            $total['profitTomorrow'] += $data['profitTomorrow'];
                            $total['peopleThisMonth'] += $data['peopleThisMonth'];
                            $total['profitThisMonth'] += $data['profitThisMonth'];
                            $total['peoplePrevMonth'] += $data['peoplePrevMonth'];
                            $total['profitPrevMonth'] += $data['profitPrevMonth'];
                            $total['debt'] += $data['debt'];
                        ?>
                    <? endforeach ?>
                    <tr>
                        <td><b>Итого</b></td>
                        <td><b><?= $total['peopleToday'] ?></b></td>
                        <td><b><?= $total['profitToday'] ?></b></td>
                        <td><b><?= $total['peopleTomorrow'] ?></b></td>
                        <td><b><?= $total['profitTomorrow'] ?></b></td>
                        <? if(Yii::$app->user->identity->access > 50): ?>
                            <td><b><?= $total['peopleThisMonth'] ?></b></td>
                            <td><b><?= $total['profitThisMonth'] ?></b></td>
                            <td><b><?= $total['peoplePrevMonth'] ?></b></td>
                            <td><b><?= $total['profitPrevMonth'] ?></b></td>
                        <? endif ?>
                        <td><b><?= $total['debt'] ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
