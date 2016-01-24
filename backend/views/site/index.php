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
                            <td><?= Yii::$app->formatter->asDecimal($data['profitToday'], 2) ?></td>
                            <td><?= $data['peopleTomorrow'] ?></td>
                            <td><?= Yii::$app->formatter->asDecimal($data['profitTomorrow'], 2) ?></td>
                            <? if(Yii::$app->user->identity->access > 50): ?>
                                <td><?= $data['peopleThisMonth'] ?></td>
                                <td><?= Yii::$app->formatter->asDecimal($data['profitThisMonth'], 2) ?></td>
                                <td><?= $data['peoplePrevMonth'] ?></td>
                                <td><?= Yii::$app->formatter->asDecimal($data['profitPrevMonth'], 2) ?></td>
                            <? endif ?>
                            <td><?= Yii::$app->formatter->asDecimal($data['debt'], 2) ?></td>
                        </tr>
                        <?
                        //Итого
                            $total['peopleToday'] += $data['peopleToday'];
                            Yii::$app->formatter->asDecimal($total['profitToday'] += $data['profitToday'], 2);
                            $total['peopleTomorrow'] += $data['peopleTomorrow'];
                            Yii::$app->formatter->asDecimal($total['profitTomorrow'] += $data['profitTomorrow'], 2);
                            $total['peopleThisMonth'] += $data['peopleThisMonth'];
                            Yii::$app->formatter->asDecimal($total['profitThisMonth'] += $data['profitThisMonth'], 2);
                            $total['peoplePrevMonth'] += $data['peoplePrevMonth'];
                            Yii::$app->formatter->asDecimal($total['profitPrevMonth'] += $data['profitPrevMonth'], 2);
                            Yii::$app->formatter->asDecimal($total['debt'] += $data['debt'], 2);
                        ?>
                    <? endforeach ?>
                    <tr>
                        <td><b>Итого</b></td>
                        <td><b><?= $total['peopleToday'] ?></b></td>
                        <td><b><?= Yii::$app->formatter->asDecimal($total['profitToday'], 2) ?></b></td>
                        <td><b><?= $total['peopleTomorrow'] ?></b></td>
                        <td><b><?= Yii::$app->formatter->asDecimal($total['profitTomorrow'], 2) ?></b></td>
                        <? if(Yii::$app->user->identity->access > 50): ?>
                            <td><b><?= $total['peopleThisMonth'] ?></b></td>
                            <td><b><?= Yii::$app->formatter->asDecimal($total['profitThisMonth'], 2) ?></b></td>
                            <td><b><?= $total['peoplePrevMonth'] ?></b></td>
                            <td><b><?= Yii::$app->formatter->asDecimal($total['profitPrevMonth'], 2) ?></b></td>
                        <? endif ?>
                        <td><b><?= Yii::$app->formatter->asDecimal($total['debt'], 2) ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
