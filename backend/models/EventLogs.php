<?php
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use backend\models\settings\Status;
use backend\models\settings\Point;
use backend\models\settings\Type;
use backend\models\settings\Managers;

class EventLogs extends ActiveRecord
{
    const ACTION_CREATE = 0;
    const ACTION_UPDATE = 1;
    const ACTION_DELETE = 2;

    public $actionArr = [
        0 => 'Создание',
        1 => 'Редактирование',
        2 => 'Удаление'
    ];

    public function rules(){
        return [
            [['timestamp', 'managerId', 'table', 'action', 'data', 'recordId'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'timestamp' => 'Дата',
            'managerId' => 'Пользователь',
            'table' => 'Источник',
            'action' => 'Действие',
            'data' => 'Данные',
            'recordId' => 'Идентификатор'
        ];
    }


    public function search($params)
    {
        $query = EventLogs::find()->joinWith('managers');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'timestamp' => SORT_DESC,
                ],
            ],
        ]);
        

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'timestamp', $this->timestamp])
            ->andFilterWhere(['like', 'managers.managerName', $this->managerId])
            ->andFilterWhere(['like', 'table', $this->table])
            ->andFilterWhere(['=', 'action', $this->action])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'recordId', $this->recordId]);
        return $dataProvider;
    }

    public function getManagers(){
        return $this->hasOne(Managers::className(), ['id' => 'managerId']);
    }
}
