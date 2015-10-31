<?php
namespace backend\models\settings;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Type extends ActiveRecord
{
    public function attributeLabels(){
        return [
            'label' => 'Тип услуги',
        ];
    }

    public static  function dropDownArray(){
        return ArrayHelper::map(self::find()->asArray()->all(), 'id', 'label');
    }
}
