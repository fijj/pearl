<?php
namespace backend\models;
use Yii;


class Reception extends Model{

    public $code;

    public function rules(){
        return [
            [['code'], 'safe']
        ];
    }
}
