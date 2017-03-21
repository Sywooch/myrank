<?php

namespace frontend\widgets\user;



class UserTrusteesWidget extends \yii\base\Widget {
    
    public $model;
    public $list;


    public function init() {
	parent::init();
	$this->list = $this->model->userTrusteesFrom;
    }
    
    public function run() {
	parent::run();
	return $this->render("userTrustees", ['list' => $this->list, 'model' => $this->model]);
    }
}
