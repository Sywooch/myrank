<?php

namespace frontend\widgets\user;

use frontend\models\UserTrustees;

class UserTrusteesWidget extends \yii\base\Widget {
    
    public $model;
    public $list;
    public $countListView = UserTrustees::COUNT_LIST_USER_PROFILE;
    public $count;

    public function init() {
	parent::init();
	$query = $this->model->getUserTrusteesList();
	$model = clone $query;
	$this->list = $query->limit($this->countListView)->all();
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
