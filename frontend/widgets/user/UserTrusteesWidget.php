<?php

namespace frontend\widgets\user;

use frontend\models\UserTrustees;

class UserTrusteesWidget extends \yii\base\Widget {
    
    public $model;
    public $list;
    public $count;

    public function init() {
	parent::init();
	$query = $this->model->getUserTrusteesFrom();
	$model = clone $query;
	$this->list = $query->limit(UserTrustees::COUNT_LIST_USER_PROFILE)->all();
	$this->count = $model->count();
    }
    
    public function run() {
	parent::run();
	return $this->render("userTrustees", [
	    'list' => $this->list, 
	    'model' => $this->model,
	    'count' => $this->count
	]);
    }
}
