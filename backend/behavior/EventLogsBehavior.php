<?php

namespace backend\behavior;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use backend\models\EventLogs;

class EventLogsBehavior extends Behavior
{
    // ...

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'afterInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }

    public function afterInsert($event)
    {
        $model = new EventLogs();
        $model->managerId = \Yii::$app->user->identity->managerId;
        $model->table = $this->owner->className();
        $model->action = EventLogs::ACTION_CREATE;
        $model->data = serialize($this->owner->attributes);
        $model->recordId = $this->owner->attributes['id'];
        $model->save();
    }

    public function beforeUpdate($event)
    {
        $model = new EventLogs();
        $model->managerId = \Yii::$app->user->identity->managerId;
        $model->table = $this->owner->className();
        $model->action = EventLogs::ACTION_UPDATE;
        $model->data = serialize([$this->owner->oldAttributes, $this->owner->attributes]);
        $model->recordId = $this->owner->attributes['id'];
        $model->save();
    }

    public function beforeDelete($event)
    {
        $model = new EventLogs();
        $model->managerId = \Yii::$app->user->identity->managerId;
        $model->table = $this->owner->className();
        $model->action = EventLogs::ACTION_DELETE;
        $model->data = serialize($this->owner->attributes);
        $model->recordId = $this->owner->attributes['id'];
        $model->save();
    }
}