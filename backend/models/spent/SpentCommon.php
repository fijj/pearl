<?php
namespace backend\models\spent;
use Yii;
use yii\db\ActiveRecord;


class SpentCommon extends ActiveRecord{

    public static function tableName(){
        return 'spent_common';
    }

    public function rules(){
        return [
            [['materials', 'advertising_online', 'advertising_offline', 'other'], 'double'],
            [['materials', 'advertising_online', 'advertising_offline', 'other'], 'default', 'value' => 0.00],
            [['comment'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'materials' => 'Расходные материалы',
            'advertising_online' => 'Реклама интернет',
            'advertising_offline' => 'Реклама оффлайн',
            'other' => 'Прочие',
            'comment' => 'Комментарий',
        ];
    }

    public function getTotal(){
        return $this->materials + $this->advertising_online + $this->advertising_offline + $this->other;
    }

    public function getModelLabel(){
        return 'Расходы общие';
    }
}
