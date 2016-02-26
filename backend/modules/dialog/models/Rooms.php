<?php
namespace backend\modules\dialog\models;

use Yii;
use yii\db\ActiveRecord;

class Rooms extends ActiveRecord
{
    const DIALOG = 0;
    const GROUP_DIALOG = 1;
    const TASK = 2;

    public $typeArr = [
        0 => 'Диалог',
        1 => 'Групповой диалог',
        2 => 'Обсуждение задачи'
    ];

    public static function tableName()
    {
        return 'dialog_rooms';
    }

    public function rules(){
        return[
            [['type', 'fromId', 'toId', 'taskId', 'toArray'], 'safe']
        ];
    }

    public function getMsg(){
        return $this->hasMany(Msg::className(), ['roomId' => 'id'])->limit(1);
    }
}
