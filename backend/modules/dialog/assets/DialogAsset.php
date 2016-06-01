<?php


namespace app\modules\dialog\assets;

use yii\web\AssetBundle;


class DialogAsset extends AssetBundle
{

    public $sourcePath = '@backend/modules/dialog/assets/';

    public $js = [
        'js/dialog.js'
    ];
    public $depends = [
        'backend\assets\AppAsset',
    ];
}