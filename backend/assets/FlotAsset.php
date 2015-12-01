<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FlotAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/flot/jquery.flot.min.js',
        'js/flot/jquery.flot.time.min.js',
        'js/flot/jquery.flot.navigate.min.js',
        'js/chart.js'
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
