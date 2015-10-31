<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Clients extends ActiveRecord
{
    public function rules(){
        return [
            [['firstName', 'secondName', 'thirdName'], 'required', 'on' => 'default'],
            [['phoneHome', 'fullName'], 'safe', 'on' => 'default'],
            [['firstName', 'secondName', 'thirdName', 'phone', 'phoneHome'], 'safe', 'on' => 'filter'],
        ];
    }

    public function scenarios(){
        return[
            'default' => ['firstName', 'secondName', 'thirdName', 'phone', 'phoneHome', 'fullName'],
            'filter' => ['firstName', 'secondName', 'thirdName', 'phone', 'phoneHome']
        ];
    }

    public function attributeLabels(){
        return [
            'firstName' => 'Фамилия',
            'secondName' => 'Имя',
            'thirdName' => 'Отчество',
            'phone' => 'Телефон мобильный',
            'phoneHome' => 'Телефон домашний'
        ];
    }

    public function search($params)
    {
        $this->scenario = 'filter';
        $query = Clients::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'secondName', $this->secondName])
            ->andFilterWhere(['like', 'thirdName', $this->thirdName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phoneHome', $this->phoneHome]);
        return $dataProvider;
    }
}
