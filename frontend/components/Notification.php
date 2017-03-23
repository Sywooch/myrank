<?php

namespace frontend\components;

use yii\base\Component;

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

}
