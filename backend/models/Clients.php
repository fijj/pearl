<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use backend\models\Orders;

class Clients extends ActiveRecord
{
    public $fromArr = [
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
    ];

    public function rules(){
        return [
            [['firstName', 'secondName', 'thirdName'], 'required', 'on' => 'default'],
            [['phoneHome', 'fullName', 'address', 'create_at', 'from'], 'safe', 'on' => 'default'],
            [['firstName', 'secondName', 'thirdName', 'phone', 'phoneHome'], 'safe', 'on' => 'filter'],
        ];
    }

    public function scenarios(){
        return[
            'default' => ['firstName', 'secondName', 'thirdName', 'phone', 'phoneHome', 'fullName', 'address', 'create_at' ,'from'],
            'filter' => ['firstName', 'secondName', 'thirdName', 'phone', 'phoneHome']
        ];
    }

    public function attributeLabels(){
        return [
            'firstName' => 'Фамилия',
            'secondName' => 'Имя',
            'thirdName' => 'Отчество',
            'phone' => 'Телефон мобильный',
            'phoneHome' => 'Телефон домашний',
            'address' => 'Адрес',
            'from' => 'Откуда узнал',
            'ordersCount' => 'Заказов'
        ];
    }

    public function search($params)
    {
        $this->scenario = 'filter';
        $query = Clients::find();
        $query->joinWith('orders')->groupBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['ordersCount'] = [
            'asc' => ['count(*)' => SORT_ASC],
            'desc' => ['count(*)' => SORT_DESC],
        ];


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'secondName', $this->secondName])
            ->andFilterWhere(['like', 'thirdName', $this->thirdName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phoneHome', $this->phoneHome]);
        return $dataProvider;
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['clientId' => 'id']);
    }

    public function getOrdersCount()
    {
        return $this->hasMany(Orders::className(), ['clientId' => 'id'])->count();
    }
}
