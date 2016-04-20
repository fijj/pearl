<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>
<div class="container">
    <div class="header">
        <img class="ticket-logo" src="img/logo.png">
        <?= Html::img(['ticket/barcode', 'code' => $order->id], ['class' => 'barcode']) ?>
        <h1>Квитанция-договор № <?= $order->contract ?> </h1>
        <p>г.Старый Оскол,пр-кт Молодёжный.д.12,тел.45-21-26 ИНН 3128091487 КПП 312801001 ОГРН 1133128000323</p>
    </div>
    <div class="content">
        <span class="entered"><?= $order->clients->fullName ?></span>
        <span class="entered"><b><?= $order->clients->phone ?></b></span>
        <span class="entered"><?= $order->clients->address ?></span>
        <br />
        <span>Дата приёма заказа: <b><?= $order->date ?></b>,</span>
        <span>Дата выдачи заказа: <b><?= $order->outDate ?></b>,</span>
        <span>Заказ принял(а): <b><?= $order->managers->managerName ?></b></span>
        <table>
            <thead>
                <tr>
                    <th>Номер</th>
                    <th>Наименование</th>
                    <th>Цвет</th>
                    <th></th>
                    <th>Фурнитура</th>
                    <th>Дефекты</th>
                    <th>Прочие дефекты</th>
                    <th>Пятна</th>
                    <th>Услуги</th>
                </tr>
            </thead>
            <tbody>
            <? foreach ($models as $key => $model): ?>
                <tr>
                    <td style="text-align: center"><?= $key + 1 ?></td>
                    <td><?= $model->caption ?></td>
                    <td><?= $model->color ?></td>
                    <td>
                        Маркировка:<b><?= $model->markingArr[$model->marking] ?></b><br />
                        Степень износа:<b><?= $model->wearArr[$model->wear] ?></b><br />
                        МЗХ:<b><?= $model->boolArr[$model->param13] ?></b><br />
                        Степень&nbspзагрязнения:<b><?= $model->pollutionArr[$model->pollution] ?></b><br />
                        Степепь&nbspзасаленности:<b><?= $model->pollutionArr[$model->salinity] ?></b>
                    <td>
                        <?= ($model->param1) ? $model->getAttributeLabel('param1').':'.$model->param1n.',' : false ?>
                        <?= ($model->param2) ? $model->getAttributeLabel('param2').',' : false ?>
                        <?= ($model->param3) ? $model->getAttributeLabel('param3').',' : false ?>
                        <?= ($model->param4) ? $model->getAttributeLabel('param4') : false ?>
                        <?= ($model->param5) ? $model->getAttributeLabel('param5').':'.$model->param5n.',' : false ?>
                        <?= ($model->param6) ? $model->getAttributeLabel('param6').',' : false ?>
                        <?= ($model->param7) ? $model->getAttributeLabel('param7').',' : false ?>
                        <?= ($model->param8) ? $model->getAttributeLabel('param8').',' : false ?>
                        <?= ($model->param9) ? $model->getAttributeLabel('param9').',' : false ?>
                        <?= ($model->param10) ? $model->getAttributeLabel('param10').',' : false ?>
                        <?= ($model->param11) ? $model->getAttributeLabel('param11').',' : false ?>
                        <?= ($model->param12) ? $model->getAttributeLabel('param12').',' : false ?>
                    </td>
                    <td>
                        <?= ($model->param14) ? $model->getAttributeLabel('param14').',' : false ?>
                        <?= ($model->param15) ? $model->getAttributeLabel('param15').',' : false ?>
                        <?= ($model->param16) ? $model->getAttributeLabel('param16').',' : false ?>
                        <?= ($model->param17) ? $model->getAttributeLabel('param17') .',': false ?>
                        <?= ($model->param18) ? $model->getAttributeLabel('param18').',' : false ?>
                        <?= ($model->param19) ? $model->getAttributeLabel('param19').',' : false ?>
                        <?= ($model->param20) ? $model->getAttributeLabel('param20').',' : false ?>
                        <?= ($model->param21) ? $model->getAttributeLabel('param21').',' : false ?>
                        <?= ($model->param22) ? $model->getAttributeLabel('param22').',' : false ?>
                        <?= ($model->param23) ? $model->getAttributeLabel('param23').',' : false ?>
                        <?= ($model->param24) ? $model->getAttributeLabel('param24').',' : false ?>
                        <?= ($model->param25) ? $model->getAttributeLabel('param25').',' : false ?>
                        <?= ($model->param26) ? $model->getAttributeLabel('param26').',' : false ?>
                        <?= ($model->param27) ? $model->getAttributeLabel('param27').',' : false ?>
                        <?= ($model->param28) ? $model->getAttributeLabel('param28').',' : false ?>
                        <?= ($model->param29) ? $model->getAttributeLabel('param29').',' : false ?>
                        <?= ($model->param30) ? $model->getAttributeLabel('param30').',' : false ?>
                        <?= ($model->param31) ? $model->getAttributeLabel('param31').',' : false ?>
                        <?= ($model->param32) ? $model->getAttributeLabel('param32').',' : false ?>
                        <?= ($model->param33) ? $model->getAttributeLabel('param33').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_1').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_2').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_3').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_4').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_5').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_6').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_7').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_8').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_9').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_10').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_11').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_12').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_13').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_14').':'.$model->param34_14n.',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_15').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_16').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_17').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_18').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_19').',' : false ?>
                    </td>
                    <td>
                        <?= $model->other ?>
                    </td>
                    <td>
                        <?= ($model->param35) ? $model->getAttributeLabel('param35').',' : false ?>
                        <?= ($model->param36) ? $model->getAttributeLabel('param36').',' : false ?>
                        <?= ($model->param37) ? $model->getAttributeLabel('param37').',' : false ?>
                        <?= ($model->param38) ? $model->getAttributeLabel('param38').',' : false ?>
                        <?= ($model->param39) ? $model->getAttributeLabel('param39').',' : false ?>
                        <?= ($model->param40) ? $model->getAttributeLabel('param40').',' : false ?>
                        <?= ($model->param41) ? $model->getAttributeLabel('param41').',' : false ?>
                        <?= ($model->param42) ? $model->getAttributeLabel('param42').',' : false ?>
                        <?= ($model->param43) ? $model->getAttributeLabel('param43').',' : false ?>
                        <?= ($model->param44) ? $model->getAttributeLabel('param44').',' : false ?>
                        <?= ($model->param45) ? $model->getAttributeLabel('param45').',' : false ?>
                        <?= ($model->param46) ? $model->getAttributeLabel('param46').',' : false ?>
                        <?= ($model->param47) ? $model->getAttributeLabel('param47').',' : false ?>
                        <?= ($model->param48) ? $model->getAttributeLabel('param48').',' : false ?>
                        <?= ($model->param49) ? $model->getAttributeLabel('param49').',' : false ?>
                        <?= ($model->param50) ? $model->getAttributeLabel('param50').',' : false ?>
                        <?= ($model->param51) ? $model->getAttributeLabel('param51').',' : false ?>
                        <?= ($model->param52) ? $model->getAttributeLabel('param52').',' : false ?>
                        <?= ($model->param53) ? $model->getAttributeLabel('param53').',' : false ?>
                        <?= ($model->param54) ? $model->getAttributeLabel('param54').',' : false ?>
                        <?= ($model->param55) ? $model->getAttributeLabel('param55').',' : false ?>
                        <?= ($model->param56) ? $model->getAttributeLabel('param56').',' : false ?>
                        <?= ($model->param57) ? $model->getAttributeLabel('param57').',' : false ?>
                        <?= ($model->param58) ? $model->getAttributeLabel('param58').',' : false ?>
                        <?= ($model->param59) ? $model->getAttributeLabel('param59').',' : false ?>
                        <?= ($model->param60) ? $model->getAttributeLabel('param60').',' : false ?>
                        <?= ($model->param61) ? $model->getAttributeLabel('param61').',' : false ?>
                        <?= ($model->param62) ? $model->getAttributeLabel('param62').',' : false ?>
                        <?= ($model->param63) ? $model->getAttributeLabel('param63').',' : false ?>
                        <?= ($model->param64) ? $model->getAttributeLabel('param64').',' : false ?>
                        <?= ($model->param65) ? $model->getAttributeLabel('param65').',' : false ?>
                        <?= ($model->param66) ? $model->getAttributeLabel('param66').',' : false ?>
                        <?= ($model->param67) ? $model->getAttributeLabel('param67').',' : false ?>
                        <?= ($model->param68) ? $model->getAttributeLabel('param68').',' : false ?>
                        <?= ($model->param69) ? $model->getAttributeLabel('param69').',' : false ?>
                        <?= ($model->param70) ? $model->getAttributeLabel('param70').',' : false ?>
                        Пятна неизвестного происхождения:<b><?= $model->boolArr[$model->param71] ?></b>
                        (без гарантии)
                    </td>
                    <td>
                        <?= ($model->param72) ? $model->getAttributeLabel('param72').',' : false ?>
                        <?= ($model->param73) ? $model->getAttributeLabel('param73').',' : false ?>
                        <?= ($model->param74) ? $model->getAttributeLabel('param74').',' : false ?>
                        <?= ($model->param75) ? $model->getAttributeLabel('param75').',' : false ?>
                        <?= ($model->param76) ? $model->getAttributeLabel('param76').',' : false ?>
                        <?= ($model->param76) ? $model->getAttributeLabel('param76').',' : false ?>
                        <?= ($model->services) ?>
                    </td>
                </tr>
            <? endforeach ?>
            </tbody>
        </table>
        <br />
        <span>Стоимость: <b><?= $order->cost ?> р.</b>(<?= \Yii::t('app', '{n, spellout}', ['n' => $order->cost]) ?>)</span><br />
        <span>Оплатил: <b><?= $order->paid ?> р.</b>(<?= \Yii::t('app', '{n, spellout}', ['n' => $order->paid]) ?>)</span>
    </div>

    <div class="footer">
        <p>Срок хранения꞉ срок ответственного хранения выполненного заказа не более <b>3х дней.</b></p>
        <p>С определением дефекта сдаваемого изделия, с их оценкой <b>СОГЛАСЕН</b> Подпись____________/Дата____________</p>
        <p>Прошу принять изделие к обработке,с правилами приема вещей Химчистки «Жемчужина» <b>ОЗНАКОМЛЕН</b>.О возможных рисках полностью информирован Подпись____________/Дата____________</p>
        <p>Качество работы (Услуги), сохранность, исходную форму, целостность <b>ПРОВЕРИЛ(А)</b>. Заказ <b>ПОЛУЧИЛ(А)</b>. Претензий к качеству услуг <b>НЕ ИМЕЮ</b> Подпись____________/Дата____________</p>
    </div>
</div>
<div class="container">
    <div class="header">
        <img class="ticket-logo" src="img/logo.png">
        <?= Html::img(['ticket/barcode', 'code' => $order->id], ['class' => 'barcode']) ?>
        <h1>Квитанция-договор № <?= $order->contract ?> </h1>
        <p>г.Старый Оскол,пр-кт Молодёжный.д.12,тел.45-21-26 ИНН 3128091487 КПП 312801001 ОГРН 1133128000323</p>
    </div>
    <div class="content">
        <span class="entered"><?= $order->clients->fullName ?></span>
        <span class="entered"><b><?= $order->clients->phone ?></b></span>
        <span class="entered"><?= $order->clients->address ?></span>
        <br />
        <span>Дата приёма заказа: <b><?= $order->date ?></b>,</span>
        <span>Дата выдачи заказа: <b><?= $order->outDate ?></b>,</span>
        <span>Заказ принял(а): <b><?= $order->managers->managerName ?></b></span>
        <table>
            <thead>
            <tr>
                <th>Номер</th>
                <th>Наименование</th>
                <th>Цвет</th>
                <th></th>
                <th>Фурнитура</th>
                <th>Дефекты</th>
                <th>Прочие дефекты</th>
                <th>Пятна</th>
                <th>Услуги</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($models as $key => $model): ?>
                <tr>
                    <td style="text-align: center"><?= $key + 1 ?></td>
                    <td><?= $model->caption ?></td>
                    <td><?= $model->color ?></td>
                    <td>
                        Маркировка:<b><?= $model->markingArr[$model->marking] ?></b><br />
                        Степень износа:<b><?= $model->wearArr[$model->wear] ?></b><br />
                        МЗХ:<b><?= $model->boolArr[$model->param13] ?></b><br />
                        Степень&nbspзагрязнения:<b><?= $model->pollutionArr[$model->pollution] ?></b><br />
                        Степепь&nbspзасаленности:<b><?= $model->pollutionArr[$model->salinity] ?></b>
                    <td>
                        <?= ($model->param1) ? $model->getAttributeLabel('param1').':'.$model->param1n.',' : false ?>
                        <?= ($model->param2) ? $model->getAttributeLabel('param2').',' : false ?>
                        <?= ($model->param3) ? $model->getAttributeLabel('param3').',' : false ?>
                        <?= ($model->param4) ? $model->getAttributeLabel('param4') : false ?>
                        <?= ($model->param5) ? $model->getAttributeLabel('param5').':'.$model->param5n.',' : false ?>
                        <?= ($model->param6) ? $model->getAttributeLabel('param6').',' : false ?>
                        <?= ($model->param7) ? $model->getAttributeLabel('param7').',' : false ?>
                        <?= ($model->param8) ? $model->getAttributeLabel('param8').',' : false ?>
                        <?= ($model->param9) ? $model->getAttributeLabel('param9').',' : false ?>
                        <?= ($model->param10) ? $model->getAttributeLabel('param10').',' : false ?>
                        <?= ($model->param11) ? $model->getAttributeLabel('param11').',' : false ?>
                        <?= ($model->param12) ? $model->getAttributeLabel('param12').',' : false ?>
                    </td>
                    <td>
                        <?= ($model->param14) ? $model->getAttributeLabel('param14').',' : false ?>
                        <?= ($model->param15) ? $model->getAttributeLabel('param15').',' : false ?>
                        <?= ($model->param16) ? $model->getAttributeLabel('param16').',' : false ?>
                        <?= ($model->param17) ? $model->getAttributeLabel('param17') .',': false ?>
                        <?= ($model->param18) ? $model->getAttributeLabel('param18').',' : false ?>
                        <?= ($model->param19) ? $model->getAttributeLabel('param19').',' : false ?>
                        <?= ($model->param20) ? $model->getAttributeLabel('param20').',' : false ?>
                        <?= ($model->param21) ? $model->getAttributeLabel('param21').',' : false ?>
                        <?= ($model->param22) ? $model->getAttributeLabel('param22').',' : false ?>
                        <?= ($model->param23) ? $model->getAttributeLabel('param23').',' : false ?>
                        <?= ($model->param24) ? $model->getAttributeLabel('param24').',' : false ?>
                        <?= ($model->param25) ? $model->getAttributeLabel('param25').',' : false ?>
                        <?= ($model->param26) ? $model->getAttributeLabel('param26').',' : false ?>
                        <?= ($model->param27) ? $model->getAttributeLabel('param27').',' : false ?>
                        <?= ($model->param28) ? $model->getAttributeLabel('param28').',' : false ?>
                        <?= ($model->param29) ? $model->getAttributeLabel('param29').',' : false ?>
                        <?= ($model->param30) ? $model->getAttributeLabel('param30').',' : false ?>
                        <?= ($model->param31) ? $model->getAttributeLabel('param31').',' : false ?>
                        <?= ($model->param32) ? $model->getAttributeLabel('param32').',' : false ?>
                        <?= ($model->param33) ? $model->getAttributeLabel('param33').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_1').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_2').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_3').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_4').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_5').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_6').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_7').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_8').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_9').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_10').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_11').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_12').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_13').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_14').':'.$model->param34_14n.',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_15').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_16').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_17').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_18').',' : false ?>
                        <?= ($model->param34) ? $model->getAttributeLabel('param34_19').',' : false ?>
                    </td>
                    <td>
                        <?= $model->other ?>
                    </td>
                    <td>
                        <?= ($model->param35) ? $model->getAttributeLabel('param35').',' : false ?>
                        <?= ($model->param36) ? $model->getAttributeLabel('param36').',' : false ?>
                        <?= ($model->param37) ? $model->getAttributeLabel('param37').',' : false ?>
                        <?= ($model->param38) ? $model->getAttributeLabel('param38').',' : false ?>
                        <?= ($model->param39) ? $model->getAttributeLabel('param39').',' : false ?>
                        <?= ($model->param40) ? $model->getAttributeLabel('param40').',' : false ?>
                        <?= ($model->param41) ? $model->getAttributeLabel('param41').',' : false ?>
                        <?= ($model->param42) ? $model->getAttributeLabel('param42').',' : false ?>
                        <?= ($model->param43) ? $model->getAttributeLabel('param43').',' : false ?>
                        <?= ($model->param44) ? $model->getAttributeLabel('param44').',' : false ?>
                        <?= ($model->param45) ? $model->getAttributeLabel('param45').',' : false ?>
                        <?= ($model->param46) ? $model->getAttributeLabel('param46').',' : false ?>
                        <?= ($model->param47) ? $model->getAttributeLabel('param47').',' : false ?>
                        <?= ($model->param48) ? $model->getAttributeLabel('param48').',' : false ?>
                        <?= ($model->param49) ? $model->getAttributeLabel('param49').',' : false ?>
                        <?= ($model->param50) ? $model->getAttributeLabel('param50').',' : false ?>
                        <?= ($model->param51) ? $model->getAttributeLabel('param51').',' : false ?>
                        <?= ($model->param52) ? $model->getAttributeLabel('param52').',' : false ?>
                        <?= ($model->param53) ? $model->getAttributeLabel('param53').',' : false ?>
                        <?= ($model->param54) ? $model->getAttributeLabel('param54').',' : false ?>
                        <?= ($model->param55) ? $model->getAttributeLabel('param55').',' : false ?>
                        <?= ($model->param56) ? $model->getAttributeLabel('param56').',' : false ?>
                        <?= ($model->param57) ? $model->getAttributeLabel('param57').',' : false ?>
                        <?= ($model->param58) ? $model->getAttributeLabel('param58').',' : false ?>
                        <?= ($model->param59) ? $model->getAttributeLabel('param59').',' : false ?>
                        <?= ($model->param60) ? $model->getAttributeLabel('param60').',' : false ?>
                        <?= ($model->param61) ? $model->getAttributeLabel('param61').',' : false ?>
                        <?= ($model->param62) ? $model->getAttributeLabel('param62').',' : false ?>
                        <?= ($model->param63) ? $model->getAttributeLabel('param63').',' : false ?>
                        <?= ($model->param64) ? $model->getAttributeLabel('param64').',' : false ?>
                        <?= ($model->param65) ? $model->getAttributeLabel('param65').',' : false ?>
                        <?= ($model->param66) ? $model->getAttributeLabel('param66').',' : false ?>
                        <?= ($model->param67) ? $model->getAttributeLabel('param67').',' : false ?>
                        <?= ($model->param68) ? $model->getAttributeLabel('param68').',' : false ?>
                        <?= ($model->param69) ? $model->getAttributeLabel('param69').',' : false ?>
                        <?= ($model->param70) ? $model->getAttributeLabel('param70').',' : false ?>
                        Пятна неизвестного происхождения:<b><?= $model->boolArr[$model->param71] ?></b>
                        (без гарантии)
                    </td>
                    <td>
                        <?= ($model->param72) ? $model->getAttributeLabel('param72').',' : false ?>
                        <?= ($model->param73) ? $model->getAttributeLabel('param73').',' : false ?>
                        <?= ($model->param74) ? $model->getAttributeLabel('param74').',' : false ?>
                        <?= ($model->param75) ? $model->getAttributeLabel('param75').',' : false ?>
                        <?= ($model->param76) ? $model->getAttributeLabel('param76').',' : false ?>
                        <?= ($model->param76) ? $model->getAttributeLabel('param76').',' : false ?>
                        <?= ($model->services) ?>
                    </td>
                </tr>
            <? endforeach ?>
            </tbody>
        </table>
        <br />
        <span>Стоимость: <b><?= $order->cost ?> р.</b>(<?= \Yii::t('app', '{n, spellout}', ['n' => $order->cost]) ?>)</span><br />
        <span>Оплатил: <b><?= $order->paid ?> р.</b>(<?= \Yii::t('app', '{n, spellout}', ['n' => $order->paid]) ?>)</span>
    </div>

    <div class="footer">
        <p>Срок хранения꞉ срок ответственного хранения выполненного заказа не более <b>3х дней.</b></p>
        <p>С определением дефекта сдаваемого изделия, с их оценкой <b>СОГЛАСЕН</b> Подпись____________/Дата____________</p>
        <p>Прошу принять изделие к обработке,с правилами приема вещей Химчистки «Жемчужина» <b>ОЗНАКОМЛЕН</b>.О возможных рисках полностью информирован Подпись____________/Дата____________</p>
        <p>Качество работы (Услуги), сохранность, исходную форму, целостность <b>ПРОВЕРИЛ(А)</b>. Заказ <b>ПОЛУЧИЛ(А)</b>. Претензий к качеству услуг <b>НЕ ИМЕЮ</b> Подпись____________/Дата____________</p>
    </div>
</div>
<style>
    html{
        font-size: 12px;
    }
    .container{
        margin: 0 auto;
        position: relative;
        height: 100%;
        margin-bottom: 10px;
        width: 1000px;
    }
    .container:first-child{
        border-bottom: 1px dashed #000000;
        margin-bottom: 30px;
    }
    .ticket-logo{
        width: 100px;
    }
    .header h1{
        font-size: 16px;
        text-align: center;
    }
    .header p{
        text-align: center;
    }

    .barcode{
        float: right;
    }

    table{
        font-size: 10px;
        border-spacing: 0;
        border-collapse: collapse;
        width: 100%;
    }

    table th, table td{
        border: 1px solid #000000;
        padding: 3px;
    }
    table thead{
        background-color: #d7d7d7;
    }
    table tbody{
        overflow-y: hidden;
    }
    .footer{
        position: absolute;
        bottom: 20px;
        font-size: 10px;
    }
    @media print{
        .container{
            height: 49.2%;
        }
    }
</style>
