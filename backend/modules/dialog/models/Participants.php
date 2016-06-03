<?php
namespace backend\modules\dialog\models;

use Yii;
use yii\db\ActiveRecord;
use backend\models\settings\Managers;
use backend\modules\dialog\models\Rooms;

class Participants extends ActiveRecord
{
    public $user;
    public function rules(){
        return[
            [['roomId', 'userId', 'user'], 'safe']
        ];
    }

    public static function tableName()
    {
        return 'dialog_participants';
    }

    public function getManagers(){
        return $this->hasOne(Managers::className(), ['id' => 'userId']);
    }

    public function getRooms(){
        return $this->hasOne(Rooms::className(), ['id' => 'roomId']);
    }

}
