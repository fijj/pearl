<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>
<div class="container" id="container">
    <?= $this->render('header', ['order' => $order]) ?>

    <div class="content">
        <table class="ticket-data">
            <thead>
            <tr>
                <th>№</th>
                <th>Вещь</th>
                <th>Цвет</th>
                <th>Основные параметры</th>
                <th>Фурнитура</th>
                <th>Дефекты</th>
                <th>Пятна (без гарантии)</th>
                <th>Услуги</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($models as $key => $model): ?>
                <?
                //Фурнитура
                $array1 = [
                    0 => [
                        ($model->param1) ? $model->getAttributeLabel('param1').'('.$model->param1n.')' : null,
                        ($model->param2) ? $model->getAttributeLabel('param2') : null,
                        ($model->param3) ? $model->getAttributeLabel('param3') : null,
                        ($model->param4) ? $model->getAttributeLabel('param4') : null,
                    ],
                    1 => [
                        ($model->param5) ? $model->getAttributeLabel('param5').'('.$model->param5n.')' : null,
                        ($model->param6) ? $model->getAttributeLabel('param6') : null,
                        ($model->param7) ? $model->getAttributeLabel('param7') : null,
                        ($model->param8) ? $model->getAttributeLabel('param8') : null,
                        ($model->param9) ? $model->getAttributeLabel('param9') : null,
                        ($model->param10) ? $model->getAttributeLabel('param10') : null,
                        ($model->param11) ? $model->getAttributeLabel('param11') : null,
                        ($model->param12) ? $model->getAttributeLabel('param12') : null,
                    ]
                ];

                //Дефекты
                $array2 = [
                    ($model->param14) ? $model->getAttributeLabel('param14') : null,
                    ($model->param15) ? $model->getAttributeLabel('param15') : null,
                    ($model->param16) ? $model->getAttributeLabel('param16') : null,
                    ($model->param17) ? $model->getAttributeLabel('param17') : null,
                    ($model->param18) ? $model->getAttributeLabel('param18') : null,
                    ($model->param19) ? $model->getAttributeLabel('param19') : null,
                    ($model->param20) ? $model->getAttributeLabel('param20') : null,
                    ($model->param21) ? $model->getAttributeLabel('param21') : null,
                    ($model->param22) ? $model->getAttributeLabel('param22') : null,
                    ($model->param23) ? $model->getAttributeLabel('param23') : null,
                    ($model->param24) ? $model->getAttributeLabel('param24') : null,
                    ($model->param25) ? $model->getAttributeLabel('param25') : null,
                    ($model->param26) ? $model->getAttributeLabel('param26') : null,
                    ($model->param27) ? $model->getAttributeLabel('param27') : null,
                    ($model->param28) ? $model->getAttributeLabel('param28') : null,
                    ($model->param29) ? $model->getAttributeLabel('param29') : null,
                    ($model->param30) ? $model->getAttributeLabel('param30') : null,
                    ($model->param31) ? $model->getAttributeLabel('param31').'('.$model->param31n.')' : null,
                    ($model->param32) ? $model->getAttributeLabel('param32') : null,
                    ($model->param33) ? $model->getAttributeLabel('param33') : null,
                    ($model->param34) ? $model->getAttributeLabel('param34') : null,
                    ($model->other) ? '<br /><b>Пр. дефекты: </b>' . $model->other : null
                ];

                //Пятна
                $array3 = [
                    ($model->param35) ? $model->getAttributeLabel('param35') : null,
                    ($model->param36) ? $model->getAttributeLabel('param36') : null,
                    ($model->param37) ? $model->getAttributeLabel('param37') : null,
                    ($model->param38) ? $model->getAttributeLabel('param38') : null,
                    ($model->param39) ? $model->getAttributeLabel('param39') : null,
                    ($model->param40) ? $model->getAttributeLabel('param40') : null,
                    ($model->param41) ? $model->getAttributeLabel('param41') : null,
                    ($model->param42) ? $model->getAttributeLabel('param42') : null,
                    ($model->param43) ? $model->getAttributeLabel('param43') : null,
                    ($model->param44) ? $model->getAttributeLabel('param44') : null,
                    ($model->param45) ? $model->getAttributeLabel('param45') : null,
                    ($model->param46) ? $model->getAttributeLabel('param46') : null,
                    ($model->param47) ? $model->getAttributeLabel('param47') : null,
                    ($model->param48) ? $model->getAttributeLabel('param48') : null,
                    ($model->param49) ? $model->getAttributeLabel('param49') : null,
                    ($model->param50) ? $model->getAttributeLabel('param50') : null,
                    ($model->param51) ? $model->getAttributeLabel('param51') : null,
                    ($model->param52) ? $model->getAttributeLabel('param52') : null,
                    ($model->param53) ? $model->getAttributeLabel('param53') : null,
                    ($model->param54) ? $model->getAttributeLabel('param54') : null,
                    ($model->param55) ? $model->getAttributeLabel('param55') : null,
                    ($model->param56) ? $model->getAttributeLabel('param56') : null,
                    ($model->param57) ? $model->getAttributeLabel('param57') : null,
                    ($model->param58) ? $model->getAttributeLabel('param58') : null,
                    ($model->param59) ? $model->getAttributeLabel('param59') : null,
                    ($model->param60) ? $model->getAttributeLabel('param60') : null,
                    ($model->param61) ? $model->getAttributeLabel('param61') : null,
                    ($model->param62) ? $model->getAttributeLabel('param62') : null,
                    ($model->param63) ? $model->getAttributeLabel('param63') : null,
                    ($model->param64) ? $model->getAttributeLabel('param64') : null,
                    ($model->param65) ? $model->getAttributeLabel('param65') : null,
                    ($model->param66) ? $model->getAttributeLabel('param66') : null,
                    ($model->param67) ? $model->getAttributeLabel('param67') : null,
                    ($model->param68) ? $model->getAttributeLabel('param68') : null,
                    ($model->param69) ? $model->getAttributeLabel('param69') : null,
                    ($model->param70) ? $model->getAttributeLabel('param70') : null,
                    ($model->param71) ? 'Пятна неизвестного про-ия' : null
                ];
                //Услуги
                $array4 = [
                    ($model->param72) ? $model->getAttributeLabel('param72') : null,
                    ($model->param73) ? $model->getAttributeLabel('param73') : null,
                    ($model->param74) ? $model->getAttributeLabel('param74') : null,
                    ($model->param75) ? $model->getAttributeLabel('param75') : null,
                    ($model->param76) ? $model->getAttributeLabel('param76') : null,
                    ($model->services) ? ($model->services) : null,
                ];

                $array1[0] = implode(', ', array_filter($array1[0], function($v){ return $v !== null; }));
                $array1[1] = implode(', ', array_filter($array1[1], function($v){ return $v !== null; }));
                $array2 = implode(', ', array_filter($array2, function($v){ return $v !== null; }));
                $array3 = implode(', ', array_filter($array3, function($v){ return $v !== null; }));
                $array4 = implode(', ', array_filter($array4, function($v){ return $v !== null; }));

                ?>
                <tr>
                    <td style="text-align: center"><?= $key + 1 ?></td>
                    <td style="text-align: center"><?= $model->caption ?> <?= ($model->quantity > 1) ? "- $model->quantity ед." : '' ?></td>
                    <td style="text-align: center"><?= $model->color ?></td>
                    <td>
                        <b>Маркировка:</b><?= $model->markingArr[$model->marking] ?><br />
                        <b>Степень износа:</b><?= $model->wearArr[$model->wear] ?><br />
                        <b>МЗХ:</b><?= $model->boolArr[$model->param13] ?><br />
                        <b>Степень&nbspзагрязнения:</b><?= $model->pollutionArr[$model->pollution] ?>
                    <td>
                        <b>Съемная:</b> <?= $array1[0] ?>
                        <br />
                        <b>Не съемная:</b> <?= $array1[1] ?>
                    </td>
                    <td>
                        <?= $array2 ?>
                    </td>
                    <td>
                        <?= $array3 ?>
                    </td>
                    <td>
                        <?= $array4 ?>
                    </td>
                    <td style="text-align: center">
                        <?= $model->cost ?>
                    </td>
                    <td style="text-align: center">
                        <?= Yii::$app->formatter->asDecimal($model->cost * $model->quantity, 2) ?>
                    </td>
                </tr>
            <? endforeach ?>
            </tbody>
        </table>
        <br />
    </div>

    <?= $this->render('footer', [
        'order' => $order,
        'models' => $models
    ]) ?>
</div>

