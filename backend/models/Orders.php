<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use backend\models\settings\Status;
use backend\models\settings\Point;
use backend\models\settings\Type;
use backend\models\settings\Managers;
use backend\behavior\EventLogsBehavior;

class Orders extends ActiveRecord
{
    public function behaviors()
    {
        return [
            EventLogsBehavior::className(),
        ];
    }
    
    const STATUS_IN_WORKSHOP = 1;
    const STATUS_READY = 2;
    const STATUS_HISTORY = 3;
    const STATUS_RECLEAN = 4;

    const TYPE_SUIT = 1;
    const TYPE_COAT = 2;
    const TYPE_TEXTILE = 3;
    const TYPE_LEATHER = 4;
    const TYPE_PILLOW = 5;
    const TYPE_LEATHER_PAINT = 6;
    const TYPE_CARPET = 7;
    const TYPE_FURNITURE = 8;


    public function rules(){
        return [
            [['date', 'number', 'typeId', 'pointId', 'statusId', 'outDate'], 'required', 'on' => 'default'],
            [['number', 'contract', 'ccount', 'delivery'], 'integer'],
            [['cost', 'paid', 'costTotal', 'deliveryCost'], 'double'],
            [['bank_card'], 'safe'],
            [['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'clientId', 'statusId', 'contract', 'outDate', 'debt'], 'safe', 'on' => 'filter'],
        ];
    }

    public function scenarios(){
        return[
            'default' => ['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'statusId', 'outDate', 'costTotal', 'contract', 'debt', 'ccount', 'delivery' ,'deliveryCost', 'bank_card'],
            'filter' => ['cost', 'paid', 'date', 'number', 'typeId', 'pointId', 'clientId', 'statusId', 'outDate', 'contract', 'debt']
        ];
    }

    public function attributeLabels(){
        return [
            'id' => 'ИД.',
            'cost' => 'Полная стоимость',
            'paid' => 'Оплатил',
            'date' => 'Дата приема',
            'number' => 'Номер вещи',
            'typeId' => 'Услуга',
            'pointId' => 'Пункт приема',
            'statusId' => 'Статус',
            'clientId' => 'Клиент',
            'outDate' => 'Дата завершения',
            'costTotal' => 'Итого с учетом коэффицента скидки',
            'contract' => 'Номер квитанции',
            'debt' => 'Долг',
            'ccount' => 'Перечистки',
            'delivery' => 'Доставка',
            'deliveryCost' => 'Стоимость доставки',
            'ticketCost' => 'Стоимость услуг',
            'ticketDiscount' => 'Общая скидка',
            'managerId' => 'Менеджер',
            'bank_card' => 'Оплата картой'
        ];
    }


    public function search($params)
    {
        $this->scenario = 'filter';
        $query = Orders::find()->joinWith('clients');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                    'id' => SORT_DESC
                ],
            ],
        ]);

        $dataProvider->sort->attributes['clientId'] = [
            'asc' => ['clients.firstName' => SORT_ASC],
            'desc' => ['clients.firstName' => SORT_DESC],
        ];

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['=', 'number', $this->number])
            ->andFilterWhere(['=', 'typeId', $this->typeId])
            ->andFilterWhere(['=', 'pointId', $this->pointId])
            ->andFilterWhere(['=', 'statusId', $this->statusId])
            ->andFilterWhere(['like', 'firstName', $this->clientId])
            ->andFilterWhere(['=', 'outDate', $this->outDate])
            ->andFilterWhere(['=', 'contract', $this->contract])
            ->andFilterWhere(['=', 'cost', $this->cost])
            ->andFilterWhere(['=', 'debt', $this->debt]);
        return $dataProvider;
    }

    public function getManagers(){
        return $this->hasOne(Managers::className(), ['id' => 'managerId']);
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

    public function debt(){
        return $this->cost - $this->paid;
    }


    public function calculate(){

        $this->cost = $this->deliveryCost + $this->ticketCost;
        $this->debt = $this->cost - $this->paid;
        $this->costTotal = $this->cost * (100 - $this->point->discount) / 100;
    }

}
