<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use backend\models\settings\Status;
use backend\models\settings\Point;
use backend\models\settings\Type;

class Orders extends ActiveRecord
{

    public function rules(){
        return [
            [['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'statusId', 'outDate'], 'required', 'on' => 'default'],
            [['number'], 'integer'],
            [['cost', 'paid', 'costTotal'], 'double'],
            [['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'clientId', 'statusId', 'outDate'], 'safe', 'on' => 'filter'],
        ];
    }

    public function scenarios(){
        return[
            'default' => ['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'statusId', 'outDate', 'costTotal'],
            'filter' => ['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'clientId', 'statusId', 'outDate']
        ];
    }

    public function attributeLabels(){
        return [
            'cost' => 'Полная стоимость',
            'paid' => 'Оплатил',
            'date' => 'Дата приема',
            'number' => 'Номер вещи',
            'typeId' => 'Услуга',
            'pointId' => 'Пункт приема',
            'statusId' => 'Статус',
            'clientId' => 'Клиент',
            'outDate' => 'Дата завершения',
            'costTotal' => 'Итого с учетом коэффицента скидки'
        ];
    }


    public function search($params)
    {
        $this->scenario = 'filter';
        $query = Orders::find()->orderBy(['date' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->joinWith(['clients' => function($query) { $query->from(['id' => 'clients']); }]);
        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'typeId', $this->typeId])
            ->andFilterWhere(['like', 'pointId', $this->pointId])
            ->andFilterWhere(['like', 'statusId', $this->statusId])
            ->andFilterWhere(['like', 'firstName', $this->clientId])
            ->andFilterWhere(['like', 'outDate', $this->outDate]);
        return $dataProvider;
    }

    public function getStatus(){
        return $this->hasOne(Status::className(), ['id' => 'statusId']);
    }

    public function getPoint(){
        return $this->hasOne(Point::className(), ['id' => 'pointId']);
    }

    public function getType(){
        return $this->hasOne(Type::className(), ['id' => 'typeId']);
    }

    public function getClients(){
        return $this->hasOne(Clients::className(), ['id' => 'clientId']);
    }

    public function costTotal(){
        return $this->cost * (100 - $this->point->discount) / 100;
    }
}
