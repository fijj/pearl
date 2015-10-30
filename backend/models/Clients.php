<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Clients extends ActiveRecord
{
    public $fullName;

    public function rules(){
        return [
            [['firstName', 'secondName', 'thirdName', 'phone'], 'required', 'on' => 'default'],
            [['firstName', 'secondName', 'thirdName', 'phone'], 'safe', 'on' => 'filter'],
        ];
    }

    public function scenarios(){
        return[
            'default' => ['firstName', 'secondName', 'thirdName', 'phone'],
            'filter' => ['firstName', 'secondName', 'thirdName', 'phone']
        ];
    }

    public function attributeLabels(){
        return [
            'firstName' => 'Фамилия',
            'secondName' => 'Имя',
            'thirdName' => 'Отчество',
            'phone' => 'Телефон',
        ];
    }

    public static function inputs(){
        $array = Yii::$app->request->post('Clients');
        $array = explode(' ', $array['fullName']);
        return [
            'firstName' => $array[0],
            'secondName' => $array[1],
            'thirdName' => $array[2],
            'phone' => $array[3],
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
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
