<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Tasks extends ActiveRecord
{
    public $typeArr = [
        0 => 'Объявление',
        1 => 'Задача',
        2 => 'Важное сообщение'
    ];

    public $statusArr = [
        0 => 'Открыто',
        1 => 'Закрыто',
    ];

    public function rules(){
        return[
            [['title'], 'required', 'on' => 'default'],
            [['status', 'type', 'message', 'date'], 'safe']
        ];
    }
    public function scenarios(){
        return[
            'default' => ['title', 'message', 'type', 'status', 'date'],
            'filter' => ['title', 'message', 'type', 'status', 'date']
        ];
    }
    public function attributeLabels(){
        return [
            'title' => 'Тема',
            'message' => 'Сообщение',
            'type' => 'Тип',
            'status' => 'Статус',
            'date' => 'Дата'
        ];
    }

    public function search($params)
    {
        $this->scenario = 'filter';
        $query = Tasks::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);


        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'date', $this->date]);
        return $dataProvider;
    }
}
