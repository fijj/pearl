<?php
namespace backend\models;
use Yii;
use backend\models\Orders;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;


class Stats extends Model{

    public $mode = 0;
    public $type;
    public $interval = 0;
    public $point;

    public static $modeArr = [
        'label' => [
            0 => 'Люди',
            1 => 'Прибыль'
        ],
        'sql' => [
            0 => 'COUNT(*)',
            1 => 'SUM(`cost`)'
        ],
    ];

    public static $intervalArr = [
        'label' => [
            0 => 'По дням',
            1 => 'По неделям',
            2 => 'По месяцам',
            3 => 'По годам',
        ],
        'sql' => [
            0 => 'date',
            1 => 'WEEK(date)',
            2 => 'MONTH(date)',
            3 => 'YEAR(date)',
        ],
    ];

    public function attributeLabels(){
        return [
            'mode' => 'По типу статистики',
            'type' => 'По типу вещи',
            'interval' => 'По времени',
            'point' => 'По точкам',
        ];
    }

    public function rules(){
        return [
            [['mode', 'type', 'interval', 'point'], 'safe']
        ];
    }

    public function stats(){
        $orders = Orders::find()->select(['MAX(date) as date', self::$modeArr['sql'][$this->mode].' as value'])
        ->groupBy(self::$intervalArr['sql'][$this->interval])
        ->andFilterWhere(['typeId' => $this->type])
        ->andFilterWhere(['pointId' => $this->point])
        ->asArray()
        ->all();
        return ArrayHelper::map($orders, 'date', 'value');
    }

    public function dateArr(){
        $minDate = Orders::find()->select('MIN(date) as date')->one();
        $maxDate = Orders::find()->select('MAX(date) as date')->one();
        $minDate = $minDate->date;
        $maxDate = $maxDate->date;
        $dateArr = [];
        $date = new \DateTime($minDate);
        $stats = $this->stats();
        while($date->format('Y-m-d') != $maxDate){
            $dateArr[$date->format('Y-m-d')] = 0 ;
            $date->modify('+1 day');
        }
        foreach ($dateArr as $key => $value){
            $newArr[] = [strtotime($key.' UTC')*1000, $stats[$key]];
        }
        return Json::encode($newArr);
    }

    public static function json($data){
        $array = [];
        foreach ($data as $i){
            $array[] = [strtotime($i['date'].' UTC')*1000, (int)$i['value']];
        }
        return Json::encode($array);
    }
}
