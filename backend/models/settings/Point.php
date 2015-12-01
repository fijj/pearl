<?php
namespace backend\models\settings;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Point extends ActiveRecord
{
    public function rules(){
        return[
            [['label', 'discount'], 'required'],
            [['discount'], 'integer']
        ];
    }
    public function attributeLabels(){

        return [
            'label' => 'Пункт приема',
            'discount' => 'Скидка'
        ];
    }

    public static function dropDownArray(){
        return ArrayHelper::map(self::find()->asArray()->all(), 'id', 'label');
    }
}
