<?php
namespace backend\modules\dialog\models;

use Yii;
use yii\db\ActiveRecord;
use backend\modules\dialog\models\Msg;
use backend\modules\dialog\models\Last;
use backend\models\settings\Managers;
class Rooms extends ActiveRecord
{
    const PRIVATE_DIALOG = 0;
    const GROUP_DIALOG = 1;
    const TASK = 2;

    public $typeArr = [
        0 => 'Диалог',
        1 => 'Групповой диалог',
        2 => 'Задачи'
    ];

    public static function tableName()
    {
        return 'dialog_rooms';
    }

    public function rules(){
        return[
            [['type', 'title', 'taskId', 'title'], 'safe']
        ];
    }
    
    public function getManagersFrom(){
        return $this->hasOne(Managers::className(), ['id' => 'from']);
    }
    
    public function getManagersTo(){
        return $this->hasOne(Managers::className(), ['id' => 'to']);
    }

    public function getMsg(){
        return $this->hasMany(Msg::className(), ['roomId' => 'id'])->limit(1);
    }

    public function getNewCount(){
        return Msg::find()->where(['roomId' => $this->id])->andWhere('timestamp > :last', [':last' => $this->getLastViewTime()])->count();
    }

    public function getLastViewTime(){
        $last = Last::find()->where(['roomId' => $this->id])->andWhere(['userId' => Yii::$app->user->identity->managerId])->one()->timestamp;
        if($last){
            return $last;
        }else{
            return 0;
        }
    }
}
