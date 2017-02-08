<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use yii\helpers\Json;

class MarksWidget extends Widget {
    
    public $model;
    
    public $allList;
    public $list;

    public $view = "marksView";

    public function init() {
	parent::init();
	$this->allList = $this->model->marks;
	$this->list = Json::decode($this->model->mark, true);
    }
    
    public function run() {
	return $this->render($this->view, [
	    'allList' => $this->allList, 
	    'list' => $this->list,
	    'uId' => $this->model->id,
	]);
    }
}
