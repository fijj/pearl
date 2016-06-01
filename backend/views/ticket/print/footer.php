<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>
    <div class="table-footer">
        <table>
            <? if ($order->deliveryCost) :?>
                <tr>
                    <td>
                        Стоимость доставки:
                    </td>
                    <td style="text-align: right">
                        <b><?= $order->deliveryCost ?> руб.</b>
                    </td>
                </tr>
            <? endif ?>
            <tr>
                <td>
                    Общая стоимость:
                </td>
                <td style="text-align: right">
                    <b><?= sprintf("%.2f", $order->cost + (float)$order->ticketDiscount) ?> руб.</b>
                </td>
            </tr>
            <tr>
                <td>
                    С учетом скидки:
                </td>
                <td style="text-align: right">
                    <b><?= $order->cost ?> руб.</b>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <div class="first">
            <p>Срок хранения꞉ срок ответственного хранения выполненного заказа не более <b>3х дней.</b></p>
            <br />
            <p>С определением дефекта сдаваемого изделия, с их оценкой <b>СОГЛАСЕН</b> <b>Подпись</b> ____________ <b>Дата</b> «___» ____________<b>20___г.</b></p>
            <br />
            <p>Прошу принять изделие к обработке,с правилами приема вещей Химчистки «Жемчужина» <b>ОЗНАКОМЛЕН(а)</b>.О возможных рисках полностью информирован</p>
            <br />
            <p><b>Подпись</b> ____________ <b>Дата</b> «___» ____________<b>20___г.</b></p>
            <br />
            <p>Качество работы (Услуги), сохранность, исходную форму, целостность <b>ПРОВЕРИЛ(а)</b>. Заказ <b>ПОЛУЧИЛ(а)</b>. Претензий к качеству услуг <b>НЕ ИМЕЮ</b></p>
            <br />
            <b>Подпись</b> ____________ <b>Дата</b> «___» ____________<b>20___г.</b>
        </div>
        <div class="second">
            <?= Html::img(['ticket/barcode', 'code' => $order->id], ['class' => 'barcode']) ?>
        </div>
    </div>
</div>
<script>
    cloneTicket();
    function cloneTicket(){
        var div = document.getElementById('container'),
            clone = div.cloneNode(true);
        document.body.appendChild(clone);
    }
</script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300&subset=latin,cyrillic);

    html{
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 7.5pt;
        line-height: 9pt;
    }
    h1 {
        margin: 0;
    }

    p{
        margin: 0;
    }
    .container{
        margin: 0 auto;
        position: relative;
        height: 100%;
        margin-bottom: 5px;
        width: 595pt;
    }
    .container:first-child{
        border-bottom: 1px dashed #000000;
        margin-bottom: 30px;
    }

    .header{
        height: 70pt;
    }

    .header .third {
        display: inline-block;
        width: 33.33333333333333%;
        float: left;
    }

    .number{
        font-size: 29pt;
        text-align: center;
        width: 41pt;
        line-height: 15pt;
        margin-bottom: 6pt;
    }

    .number span {
        font-size: 12pt;
        padding-top: -10px;
    }

    .client, .address {
        padding-left: 6pt;
    }

    .logo{
        width: 50%;
        margin: 0px auto;
        display: block;
    }

    .contract{
        font-size: 12pt;
        text-align: right;
        margin: 5pt 0 8pt 0;
    }

    .details{
        text-align: right;
    }

    .tel{
        font-size: 8pt;
    }

    .details .sml{
        font-size: 6pt;
    }

    hr{
        width: 100%;
        float: left;
    }

    .info {
        padding-top: 6pt;
        clear: both;
    }
    .info .quarter{
        display: inline-block;
        width: 25%;
        float: left;
    }

    .phone{
        padding-left: 6pt;
    }

    .right-align{
        text-align: right;
    }

    table.ticket-data{
        font-size: 7.5pt;
        border-spacing: 0;
        border-collapse: collapse;
        width: 100%;
        border-top: 2px solid black;
        border-bottom: 2px solid black;
    }

    table.ticket-data th, table.ticket-data td{
        border: 1px solid #000000;
        padding: 3px;
    }

    table.ticket-data tbody{
        overflow-y: hidden;
    }
    .footer{
        position: absolute;
        bottom: 20px;
        width: 100%;
    }

    .first, .second {
        display: inline-block;
        float: left;
    }

    .first{
        width: 80%;
    }

    .second{
        width: 20%;
    }

    .barcode{
        position: absolute;
        bottom: 0px;
        right: 0px;
    }

    .table-footer table{
        width: 130pt;
        float: right;
        font-size: 7.5pt;
    }

    @media print{
        .container{
            height: 49%;
        }
    }
</style>
