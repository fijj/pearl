<?php
namespace backend\models\spent;
use Yii;
use yii\db\ActiveRecord;


class SpentRelation extends ActiveRecord{

    public static function tableName(){
        return 'spent_relation';
    }

    public function rules(){
        return [
            [['date'], 'required'],
        ];
    }

    public function attributeLabels(){
        return [
            'date' => 'Дата',
        ];
    }

    public function getCommon(){
        return $this->hasOne(SpentCommon::className(), ['relationId' => 'id']);
    }

    public function getCleaner(){
        return $this->hasOne(SpentCleaner::className(), ['relationId' => 'id']);
    }

    public function getCarpet(){
        return $this->hasOne(SpentCarpet::className(), ['relationId' => 'id']);
    }
}
