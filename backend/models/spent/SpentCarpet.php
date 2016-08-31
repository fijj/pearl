<?php
namespace backend\models\spent;
use Yii;
use yii\db\ActiveRecord;


class SpentCarpet extends ActiveRecord{

    public static function tableName(){
        return 'spent_carpet';
    }

    public function rules(){
        return [
            [['pay', 'tax', 'rent', 'chemicals', 'reward', 'other'], 'double'],
            [['pay', 'tax', 'rent', 'chemicals', 'reward', 'other'], 'default', 'value' => 0.00],
            [['comment'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'pay' => 'Зарплата',
            'tax' => 'Налоги',
            'rent' => 'Аренда',
            'chemicals' => 'Химия',
            'reward' => 'Премия',
            'other' => 'Прочие',
            'comment' => 'Комментарий',
        ];
    }
}
