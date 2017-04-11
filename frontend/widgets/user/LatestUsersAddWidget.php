<?php

namespace frontend\widgets\user;

use frontend\models\User;

class LatestUsersAddWidget extends \yii\base\Widget {
    
    public $model;


    public function init() {
	parent::init();
	$this->model = User::find()
		->where(['step' => 0])
		->orderBy("id DESC")
		->limit(User::LIMIT_VIEW)
		->all();
    }
    
    public function run() {
	parent::run();
	return $this->render("latestUserAdd", ['model' => $this->model]);
    }
}
