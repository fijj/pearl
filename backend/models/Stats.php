<?php
namespace backend\models;
use Yii;
use backend\models\Orders;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use backend\models\settings\Point;


class Stats extends Model{

    public $mode = 0;
    public $type;
    public $interval = 0;
    public $point;
    public $split;

    public static $splitArr = [
        0 => 'Не разбивать',
        1 => 'По точкам',
        2 => 'По типам'
    ];

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
            'split' => 'Разбить'
        ];
    }

    public function rules(){
        return [
            [['mode', 'type', 'interval', 'point'], 'safe']
        ];
    }

    public function series($typeId = null, $pointId = null){

        $type = ($typeId == null) ? $this->type : $typeId;
        $point = ($pointId == null) ? $this->point : $pointId;

        $orders = Orders::find()->select(['MAX(date) as date', self::$modeArr['sql'][$this->mode].' as value'])
        ->groupBy(self::$intervalArr['sql'][$this->interval])
        ->andFilterWhere(['typeId' => $type])
        ->andFilterWhere(['pointId' => $point])
        ->asArray()
        ->all();
        return ArrayHelper::map($orders, 'date', 'value');
    }

    public function getData(){
        
        $minDate = Orders::find()->select('MIN(date) as date')->one();
        $maxDate = Orders::find()->select('MAX(date) as date')->one();
        $minDate = $minDate->date;
        $maxDate = $maxDate->date;
        $dateArr = [];
        $date = new \DateTime($minDate);
        $series = $this->series();

        while($date->format('Y-m-d') <= $maxDate){
            $dateArr[$date->format('Y-m-d')] = 0 ;
            $date->modify('+1 day');
        }

        foreach ($dateArr as $key => $value){
            $newArr[] = [strtotime($key.' UTC')*1000, (int)$series[$key]];
        }

        return Json::encode($newArr);
    }

    public static function getMonthArr(){
        $minDate = Orders::find()->select('MIN(date) as date')->one();
        $maxDate = Orders::find()->select('MAX(date) as date')->one();
        $minDate = $minDate->date;
        $maxDate = $maxDate->date;
        $dateArr = [];
        $date = new \DateTime($minDate);

        while($date->format('Y-m') <= $maxDate){
            $dateArr[] = $date->format('m-Y') ;
            $date->modify('+1 month');
        }

        return $dateArr;
    }
}
