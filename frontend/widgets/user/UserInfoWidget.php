<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use yii\helpers\Json;

class UserInfoWidget extends Widget {
    
    public $model;
    public $fields = [];
    
    public function init() {
	parent::init();
    }
    
    public function run() {
	parent::run();
	return $this->render("userInfoWidget", ['fields' => $this->fields]);
    }
}
