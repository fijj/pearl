<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>
<div class="container">
    <div class="header">
        <img class="ticket-logo" src="img/logo.png">
        <?= Html::img(['ticket/barcode', 'codetype' => 'Code128', 'size' => '30', 'text' => $model->orderId], ['class' => 'barcode']) ?>
    </div>
    <div class="content">
        <span class="entered"><?= $model->clients->fullName ?></span>
        <span class="entered"><b><?= $model->clients->phone ?></b></span>
        <span class="entered"><?= $model->clients->address ?></span>
        <br />
        <span>Дата приёма заказа: <b><?= $model->orders->date ?></b></span>
        <span>Дата выдачи заказа: <b><?= $model->orders->outDate ?></b></span>

        <table>
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Маркировка</th>
                    <th>Степень износа</th>
                    <th>Цвет</th>
                    <th>Фурнитура съемная</th>
                    <th>Фурнитура несъемная</th>
                    <th>Искусственные материалы, запрещенные к химчистке</th>
                    <th>Степень загрязнения</th>
                    <th>Дефекты</th>
                    <th>Пятна пищевые</th>
                    <th>Пятна бытовые</th>
                    <th>Пятна косметические</th>
                    <th>Пятна лекарственные</th>
                    <th>Пятна неизвестного происхождения</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $model->caption ?></td>
                    <td><?= $model->markingArr[$model->marking] ?></td>
                    <td><?= $model->wearArr[$model->wear] ?></td>
                    <td><?= $model->color ?></td>
                    <td>
                        <?= ($model->param1) ? $model->getAttributeLabel('param1').':'.$model->param1n : false ?>
                        <?= ($model->param2) ? $model->getAttributeLabel('param2') : false ?>
                        <?= ($model->param3) ? $model->getAttributeLabel('param3') : false ?>
                        <?= ($model->param4) ? $model->getAttributeLabel('param4') : false ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <span>Стоимость: <b><?= $model->orders->cost ?> р.</b>(<?= \Yii::t('app', '{n, spellout}', ['n' => $model->orders->cost]) ?>)</span><br />
        <span>Оплатил: <b><?= $model->orders->paid ?> р.</b>(<?= \Yii::t('app', '{n, spellout}', ['n' => $model->orders->paid]) ?>)</span>
    </div>
</div>
<style>
    html{
        font-size: 12px;
    }
    .container{
        position: relative;
        border-bottom: 1px dashed #000000;
        height: 50%;
    }
    .ticket-logo{
        margin-bottom: 30px;
        width: 100px;
    }

    .barcode{
        float: right;
    }

    table{
        font-size: 10px;
        border-spacing: 0;
        border-collapse: collapse;
    }

    table th, table td{
        border: 1px solid #000000;
        padding: 3px;
    }
    table thead{
        background-color: #d7d7d7;
    }
    .footer{
        position: absolute;
        bottom: 0px;
    }
</style>
