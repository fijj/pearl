<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Камеры';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="iv-embed" style="margin:0 auto;padding:0;border:0;width:902px;">
    <div class="iv-v" style="display:block;margin:0;padding:1px;border:0;background:#000;">
        <iframe class="iv-i" style="display:block;margin:0;padding:0;border:0;"
                src="//open.ivideon.com/embed/v2/?server=100-115b98cbaebbb55d8c6b16dae54a1042&amp;camera=0&amp;width=&amp;height=&amp;lang=ru"
                width="900" height="675" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="iv-b" style="display:block;margin:0;padding:0;border:0;">
        <div style="float:right;text-align:right;padding:0 0 10px;line-height:10px;"><a class="iv-a"
                                                                                        style="font:10px Verdana,sans-serif;color:inherit;opacity:.6;"
                                                                                        href="http://www.ivideon.com/"
                                                                                        target="_blank">powered by
                Ivideon</a></div>
        <div style="clear:both;height:0;overflow:hidden;">&nbsp;</div>
        <script src="http://open.ivideon.com/embed/v2/embedded.js"></script>
    </div>
</div>

