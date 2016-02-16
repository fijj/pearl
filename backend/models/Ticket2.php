<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class Ticket2 extends ActiveRecord
{
    public function rules(){
        return [

        ];
    }

    public function attributeLabels(){
        return [
            'contract' => 'Квитанция-договор №',
            'mark' => '№ метки',
            'clientId' => 'Заказчик',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'description' => '',
            'cb1' => '',
            'cb2' => '',
            'cb3' => '',
            'cb4' => '',
            'cb5' => '',
            'cb6' => '',
            'cb7' => '',
            'cb8' => '',
            'cb9' => '',
            'cb10' => '',
            'cb11' => '',
            'cb12' => '',
            'cb13' => '',
            'cb14' => '',
            'param1' => '',
            'param2' => '',
            'param3' => '',
            'param4' => '',
            'param5' => '',
            'cost' => '',
        ];
    }

    public function getOrders(){
        return $this->hasOne(Orders::className(), ['id' => 'orderId']);
    }

    public function getClients(){
        return $this->hasOne(Clients::className(), ['id' => 'clientId']);
    }
}
