<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class Ticket extends ActiveRecord
{

    public $numberArr = [
        0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20
    ];

    public $boolArr = [
        0 => 'Нет',
        1 => 'Да'
    ];

    public $markingArr = [
        0 => 'имеется',
        1 => 'неполная',
        2 => 'запрещено',
        4 => 'отсутствует'
    ];

    public $wearArr = [
        0 => '0%',
        1 => '10%',
        2 => '20%',
        3 => '30%',
        4 => '40%',
        5 => '50%',
        6 => '60%',
        7 => '70%',
        8 => '80%',
        9 => '90%',
        10 => '100%'
    ];

    public $pollutionArr = [
        0 => 'общее',
        1 => 'среднее',
        2 => 'сильное',
        3 => 'очнеь сильное'
    ];

    public $salinityArr = [
        0 => 'общая',
        1 => 'средняя',
        2 => 'сильная',
    ];

    public function getOrders(){
        return $this->hasOne(Orders::className(), ['id' => 'orderId']);
    }

    public function getClients(){
        return $this->hasOne(Clients::className(), ['id' => 'clientId']);
    }

    //Определение типа квитанции
    public static function ticketModel($typeId)
    {
        switch ($typeId){
            case(Orders::TYPE_SUIT):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_COAT):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_TEXTILE):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_LEATHER):
                $ticket = Leather::className();
                break;
            case(Orders::TYPE_PILLOW):
                $ticket = Textile::className();
                break;
            case(Orders::TYPE_LEATHER_PAINT):
                $ticket = Leather::className();
                break;
            case(Orders::TYPE_CARPET):
                $ticket = Carpet::className();
                break;
            case(Orders::TYPE_FURNITURE):
                $ticket = Textile::className();
                break;
        }

        return $ticket;
    }
}
