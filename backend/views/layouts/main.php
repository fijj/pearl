<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Жемчужина CRM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top hidden-print',
        ],
        //'innerContainerOptions' => ['class'=>'container-fluid'],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Приемка', 'url' => ['/reception/index'],
        ];
        $menuItems[] = [
            'label' => 'Заказы', 'url' => ['/orders/index'],
        ];
        $menuItems[] = [
            'label' => 'Клиенты', 'url' => ['/clients/index'],
        ];
        $menuItems[] = [
            'label' => 'Задачи', 'url' => ['/tasks/index'],
        ];
        $menuItems[] = [
            'label' => 'Диалоги ', 'url' => ['/dialog/dialog/index'],
            'options' => ['class' => 'dialog-notification']
        ];
        $menuItems[] = [
            'label' => 'Статистика', 'url' => ['/stats/index'],
        ];
        $menuItems[] = [
            'label' => 'Настройки',
            'items' => [
                ['label' => 'Менеджеры', 'url' => ['/settings/managers/index']],
                ['label' => 'Точки', 'url' => ['/settings/point/index']],
                ['label' => 'Расходы', 'url' => ['/spent/index']],
                ['label' => 'Логи', 'url' => ['/event-logs/index']],
                ['label' => 'Камеры', 'url' => ['/cams/index']]
            ]
        ];
        $menuItems[] = [
            'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="main-body container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'breadcrumb hidden-print']
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer hidden-print">
    <div class="container">
        <p class="pull-left">&copy; Жемчужина <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>