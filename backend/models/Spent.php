<?php
namespace backend\models;
use Yii;
use yii\db\ActiveRecord;


class Spent extends ActiveRecord{

    public function rules(){
        return [
            [['date'], 'required'],
            [['sp1', 'sp2', 'sp3', 'sp4', 'sp5', 'sp6', 'sp7', 'sp8', 'sp9', 'sp10', 'sp11'], 'double'],
            [['comment'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'date' => 'Дата',
            'sp1' => 'Зарплата',
            'sp2' => 'Налоги',
            'sp3' => 'Коммунальные платежи',
            'sp4' => 'Аренда химчистка',
            'sp5' => 'Аренда ковры',
            'sp6' => 'Связь',
            'sp7' => 'Расходные материалы',
            'sp8' => 'Реклама интернет',
            'sp9' => 'Реклама офлайн',
            'sp10' => 'Премия',
            'sp11' => 'Прочие затраты',
            'comment' => 'Коментарий'
        ];
    }
}
