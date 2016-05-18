<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>
    <div class="header">
        <div class="third">
            <h1 class="number">
                <?= $order->number ?><br/>
                <span>номер</span>
            </h1>
            <p class="client">
                Клиент: <strong><?= $order->clients->fullName ?></strong>
            </p>
            <p class="address">
                Адрес доставки: <strong><?= $order->clients->address ?></strong>
            </p>
        </div>
        <div class="third">
            <img class="logo" src="img/logo.jpg">
        </div>
        <div class="third">
            <h1 class="contract">Квитанция-договор № <?= $order->contract ?></h1>
            <p class="details">
                г.Старый Оскол,пр-кт Молодёжный.д.12,<b><span class="tel">тел.45-21-26</span></b><br />
                Режим работы: <b>с 8-00 до 20-00 без пер. и выходных</b><br />
                <span class="sml">
                    <b>ИНН</b> 3128091487 <b>КПП</b> 312801001 <b>ОГРН</b> 1133128000323
                </span>
            </p>
        </div>
        <hr />
        <div class="info">
            <div class="quarter">
                <span class="phone">Телефон клиента: <b><?= $order->clients->phone ?></b></span>
            </div>
            <div class="quarter right-align">
                <span>Дата приёма заказа: <b><?= $order->create_at ?></b></span>
            </div>
            <div class="quarter right-align">
                <span>Дата выдачи заказа: <b><?= $order->outDate ?></b></span>
            </div>
            <div class="quarte right-align">
                <span>Заказ принял(а): <b><?= $order->managers->managerName ?></b></span>
            </div>
        </div>
    </div>