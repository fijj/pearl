<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$this->title = $title;
$this->params['breadcrumbs'][] = [
    'label' => 'Квитанция',
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-1-container">
    <?
    $form = ActiveForm::begin([
        'id' => 'ticket-form-1',
        'options' => ['class' => 'form-inline'],
    ])
    ?>
    <div class="ticket-1-header">
        <div class="row">
            <div class="col-xs-4">
                <img class="ticket-logo" src="img/logo.png">
            </div>
            <div class="col-xs-4">

            </div>
            <div class="col-xs-4">
                <?= Html::img(['ticket/barcode', 'codetype' => 'Code128', 'size' => '30', 'text' => $model->orderId], ['class' => 'barcode']) ?>
            </div>
        </div>
        <div class="row">
            <span class="ticket-contacts">
                Клиент: <span class="entered"><?= $model->clients->fullName ?></span>
            </span>
            <span class="ticket-contacts">
                Телефон: <span class="entered"><?= $model->clients->phone ?></span>
            </span>
            <span class="ticket-contacts">
                Адрес: <span class="entered"><?= $model->clients->address ?></span>
            </span>
        </div>
    </div>
    <div class="ticket-1-border">
        <span>Наименование и описание вещи, оценка износа и краткое описание дефектов:</span>
        <?= $form->field($model, 'description')->textInput(['class' => 'description']) ?>
        <p><strong>Изделия без маркировки принимается на договорной основе с согласия клиента к химчистке по существующим технологиям и ГОСТу:</strong></p>
        <span>Наличие символики (маркировки) фирмы-изготовителя о способе чистки:</span>
        <br />
        <?= $form->field($model, 'cb1')->checkbox() ?>
        <?= $form->field($model, 'cb2')->checkbox() ?>
        <?= $form->field($model, 'cb3')->checkbox() ?>
        <?= $form->field($model, 'cb4')->checkbox() ?>
        <?= $form->field($model, 'param1')->textInput(['class' => 'param1']) ?>
        <p><strong>Изделия без маркировки фирмы-изготовителя либо с маркировкой запрещающей химчистку принимаются в чистку только с согласия Клиента и обрабатываются по существующим отечественным и зарубежным технологиям, без претензий к качеству и товарному виду изделия, загрублению и изменению структуры поверхности кожевой ткани.</strong></p>
        <p>В этом случае в процессе хим. обработки у тках изделий возможно проявление скрытых дефектов: разнооттеночность, вытертость, вытравки, болячки, белесость, жесткость кожевой ткани, потеря товарного вида, усадка и деформация, изменение цвета.</p>
        <span>1. Степень загрязения:</span>
        <?= $form->field($model, 'cb5')->checkbox() ?>
        <?= $form->field($model, 'cb6')->checkbox() ?>
        <?= $form->field($model, 'cb7')->checkbox() ?>
        <br />
        <span>2. Степень засаленности/зажиренности:</span>
        <?= $form->field($model, 'cb8')->checkbox() ?>
        <?= $form->field($model, 'cb9')->checkbox() ?>
        <?= $form->field($model, 'cb10')->checkbox() ?>
        <br />
        <span>3. Выгор/побурение:</span>
        <?= $form->field($model, 'cb11')->checkbox() ?>
        <?= $form->field($model, 'cb12')->checkbox() ?>
        <?= $form->field($model, 'cb13')->checkbox() ?>
        <?= $form->field($model, 'cb14')->checkbox() ?>
        <p><strong>После чистки в местах загрязненности, засаленности, потертости, возможно проявление белесости, вымывание и сход красителя, сход пленочного покрытия.</strong></p>
        <span>4. Разнооттеночность:</span>
        <?= $form->field($model, 'cb15')->checkbox() ?>
        <?= $form->field($model, 'cb16')->checkbox() ?>
        <?= $form->field($model, 'cb17')->checkbox() ?>
        <br />
        <span>5. Наличие клеевых деталей (полочки, лацканы, воротник, низ рукавов и проч.):</span>
        <?= $form->field($model, 'cb18')->checkbox() ?>
        <?= $form->field($model, 'cb19')->checkbox() ?>
        <?= $form->field($model, 'cb20')->checkbox() ?>
        <?= $form->field($model, 'cb21')->checkbox() ?>
        <p><strong>При обработке возможны проявления клея в виде темных пятен, деформация клеевых швов и деталей, расклеивание (подол, деталей ремонта до чистки и т.д.).</strong></p>
        <span>6. Дефекты сырья и выделки (пожизненные пороки, производств. пороки):</span>
        <?= $form->field($model, 'cb22')->checkbox() ?>
        <?= $form->field($model, 'cb23')->checkbox() ?>
        <?= $form->field($model, 'cb24')->checkbox() ?>
        <?= $form->field($model, 'cb25')->checkbox() ?>
        <?= $form->field($model, 'cb26')->checkbox() ?>
        <?= $form->field($model, 'cb27')->checkbox() ?>
        <?= $form->field($model, 'cb28')->checkbox() ?>
        <?= $form->field($model, 'cb29')->checkbox() ?>
        <?= $form->field($model, 'cb30')->checkbox() ?>
        <?= $form->field($model, 'cb31')->checkbox() ?>
        <?= $form->field($model, 'cb32')->checkbox() ?>
        <?= $form->field($model, 'cb33')->checkbox() ?>
        <?= $form->field($model, 'cb34')->checkbox() ?>
        <?= $form->field($model, 'cb35')->checkbox() ?>
        <?= $form->field($model, 'cb36')->checkbox() ?>
        <?= $form->field($model, 'cb37')->checkbox() ?>
        <?= $form->field($model, 'cb38')->checkbox() ?>
        <?= $form->field($model, 'cb39')->checkbox() ?>
        <?= $form->field($model, 'cb40')->checkbox() ?>
        <?= $form->field($model, 'cb41')->checkbox() ?>
        <br />
        <span>7. Дефекты изделия, возникшие в процессе эксплуатации изделия:</span>
        <?= $form->field($model, 'cb42')->checkbox() ?>
        <?= $form->field($model, 'cb43')->checkbox() ?>
        <?= $form->field($model, 'cb44')->checkbox() ?>
        <?= $form->field($model, 'cb45')->checkbox() ?>
        <?= $form->field($model, 'cb46')->checkbox() ?>
        <?= $form->field($model, 'cb47')->checkbox() ?>
        <?= $form->field($model, 'cb48')->checkbox() ?>
        <?= $form->field($model, 'cb49')->checkbox() ?>
        <?= $form->field($model, 'cb50')->checkbox() ?>
        <?= $form->field($model, 'cb51')->checkbox() ?>
        <?= $form->field($model, 'param2')->textInput(['class' => 'param2']) ?>
        <br />
        <span>8. Дефекты покрытия изделия</span>
        <?= $form->field($model, 'cb52')->checkbox() ?>
        <?= $form->field($model, 'cb53')->checkbox() ?>
        <?= $form->field($model, 'cb54')->checkbox() ?>
        <?= $form->field($model, 'cb55')->checkbox() ?>
        <?= $form->field($model, 'cb56')->checkbox() ?>
        <?= $form->field($model, 'cb57')->checkbox() ?>
        <p><strong>Возможны: изменения цвета, внешнего вида, удаление пленочного покрытия и блеска, вымывание красителя, невозможность нанесения красящих композиций.</strong></p>
        <span>9. Наличие трудновыводимых пятен и солевых вытравок:</span>
        <?= $form->field($model, 'param3')->textInput(['class' => 'param3']) ?>
        <p><strong>Изделия с пятнами от крови, чернил, пасты, слюны животных, белкового происхождения, от растительных масел, жиров, ГСМ, мазута, клея, от отбеливателя, кислот, щелочей, длительное время находившихся на изделии в процессе эксплуатации, а также с пятнами, образовавшимися в результате самостоятельных попыток удаления химикатами, мылом и водой - принимаются без гарантии пятновыведения. Выведение пятен, устранение водных затеков и закрасов считаются дефектами и могут остаться заметными даже после тонирования, подкраса и крашения изделия. Солевые вытравки не удаляются. После чистки у изделий с утеплителем (заполнителем) возможна свалянность синтепона, пуха, пера.</strong></p>
        <p>10. Наличие деталей из искусственных материалов, несъемной фурнитуры:</p>
        <?= $form->field($model, 'param4')->textInput(['class' => 'param14']) ?>
        <p><strong>При наличии деталей из искуственных материалов, несъемной фурнитуры, не подлежащих химчистке, ответственность за их повреждение несет фирма-изготовитель изделия.</strong></p>
        <span>11. Потеря товарного вида изделия:</span>
        <?= $form->field($model, 'cb58')->checkbox() ?>
        <?= $form->field($model, 'cb59')->checkbox() ?>
        <?= $form->field($model, 'cb60')->checkbox() ?>
        <?= $form->field($model, 'cb61')->checkbox() ?>
        <br />
        <span>12. Износ:</span>
        <?= $form->field($model, 'cb62')->checkbox() ?>
        <?= $form->field($model, 'cb63')->checkbox() ?>
        <?= $form->field($model, 'cb64')->checkbox() ?>
        <?= $form->field($model, 'cb65')->checkbox() ?>
        <p>13. Сопутствующие работы:</p>
        <?= $form->field($model, 'param5')->textInput(['class' => 'param5']) ?>
        <p>14. Стоимость услуги: <span class="entered"><?= $model->orders->cost ?></span></p>
        <p>Деньги в сумме (прописью): <span class="entered"><?= \Yii::t('app', '{n, spellout}', ['n' => $model->orders->cost]) ?></span> руб.   Получил _____________</p>
        <p>С определением деффектов сдаваемого изделия, их оценкой СОГЛАСЕН: _____________ (_____________) "___" _________г.</p>
    </div>
    <br />
    <p>О скрытых недостатках, особых свойствах кожи и меха, которые не могли быть обнаружены во время надлежащей приемки, неустранимых дефектах, последствиях х/чистки, в случае некачественного изготовления изделия фирмой-изготовителем и недостоверной информацией по уходу за изделием (либо отсутствия таковой) ПРЕДУПРЕЖДЕН. С правилами приема вещей в химчистку (стирку), а также с условиями выполнения типового договора по химчистке (стирке) изделий, указанных в "Информация для клиентов" ОЗНАКОМЛЕН И СОГЛАСЕН. Я понимаю и принимаю вышеизложенный риск, о присутствии которого я полностью информирован. __________________________</p>
    <p>Срок ответственного хранения выполненого заказа не более 3-х дней.</p>
    <p>Все претензии к качеству услуши, в отношение явных недостатков, могут быть предъявлены только в момент приёма-передачи (ст. 29 Закона "О защите прав потребителей"). Заказчик, принявший изделие без проверки, лишается права на претензию и ссылаться на недостатки в услуге, которые могут быть устранены (ст. 720 ГК РФ).</p>
    <p>Качество работы (услуги), сохранность, исходную форму, целостность ПРОВЕРИЛ.</p>
    <p>Заказ ПОЛУЧИЛ "____"___________________201___г.</p>
    <p>Претензий к качеству услуги НЕ ИМЕЮ: ____________________________________</p>
</div>

<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right hidden-print']) ?>
<?php ActiveForm::end() ?>