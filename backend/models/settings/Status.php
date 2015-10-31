<?php
namespace backend\models\settings;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Status extends ActiveRecord
{
    public function rules(){
        return[
            [['id', 'label'], 'safe']
        ];
    }

    public static  function dropDownArray(){
        return ArrayHelper::map(self::find()->asArray()->all(), 'id', 'label');
    }
}
