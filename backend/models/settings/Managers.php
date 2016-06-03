<?php
namespace backend\models\settings;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use yii\helpers\ArrayHelper;

class Managers extends ActiveRecord
{
    public $rulesArr= [
        10 => 'Менеджер',
        100 => 'Администратор'
    ];
    public function rules(){
        return [
            [['managerName'], 'required'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот email уже существует'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['managerPhone', 'access'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'managerName' => 'Ф.И.О. ',
            'managerPhone' => 'Телефон ',
            'email' => 'Почта ',
            'password' => 'Пароль ',
            'access' => 'Роль'
        ];
    }

    public function scenarios(){
            return [
                'new' => ['managerName', 'email', 'password', 'managerPhone', 'managerPhoto', 'access'],
                'edit' => ['managerName', 'managerPhone', 'access', 'password'],
                'removePhoto' => ['managerPhoto'],
            ];
    }

    public function saveUser($model){
        $user = new User;
        $user->username = $model->email;
        $user->managerId = $model->id;
        $user->email = $model->email;
        $user->fullUsername = $model->managerName;
        $user->role = $this->rulesArr[$model->access];
        $user->access = $model->access;
        $user->setPassword($model->password);
        $user->generateAuthKey();
        $user->save();
    }

    public function updateUser($model, $id){
        $user = User::findOne(['managerId' => $id]);
        $user->username = $model->email;
        $user->managerId = $model->id;
        $user->email = $model->email;
        $user->fullUsername = $model->managerName;
        $user->role = $this->rulesArr[$model->access];
        $user->access = $model->access;
        $user->setPassword($model->password);
        $user->generateAuthKey();
        $user->save();
    }

    public function deleteUser($id){
        $user = User::findOne(['managerId' => $id]);
        $user->delete();
    }

    static function managersArr(){
        return ArrayHelper::map(Managers::find()->asArray()->all(), 'id', 'managerName');
    }

    static function managerArrWithoutOwner(){
        $array = ArrayHelper::map(Managers::find()->asArray()->all(), 'id', 'managerName');
        unset($array[Yii::$app->user->identity->managerId]);
        return $array;
    }
}
