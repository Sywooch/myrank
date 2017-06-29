<?php

namespace frontend\components;

use yii\base\Component;
use frontend\models\UserNotification;

class Notification extends Component {
    
    public $sess;
    
    public function init() {
	$this->sess = \Yii::$app->session;
	parent::init();
    }

    public function set($key, $value) {
	$this->sess->set($key, $value);
    }

    public function get($key) {
	if($this->sess->has($key)) {
	    $text = $this->sess->get($key);
	    $this->sess->remove($key);
	    return $text;
	}
	return false;
    }

    public function saveNotif ($type, $userId, $userType) {
	$model = UserNotification::find()->where(['user_id' => $userId, 'user_type' => $userType, 'type' => $type])->one();
	if(!isset($model->id)) {
	    $model = new UserNotification();
	    $model->type = $type;
	    $model->user_id = $userId;
            $model->user_type = $userType;
	    $model->value = 1;
	} else {
	    $model->updateCounters(['value' => 1]);
	}
	return $model->save();
    }
    
    public function getNotif ($type) {
	if(\Yii::$app->user->id !== NULL) {
	    $uId = \Yii::$app->user->id;
	    $model = UserNotification::find()->where(['user_id' => $uId, 'type' => $type])->one();
	    if(isset($model->id)) {
		$out = $model->value;
		$model->delete();
	    } else {
		$out = 0;
	    }
	}
	return $out;
    }
}
