<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use yii\helpers\Json;
use frontend\models\Marks;

class MarksWidget extends Widget {
    
    public $model;
    
    public $allList;
    public $list;

    public $view = "marksView";

    public function init() {
	parent::init();
	$marks = $this->model->marks;
	if($this->model->owner) {
	    $this->allList = $marks[Marks::MARKS_ACCESS_USER];
	    $this->list = Json::decode($this->model->mark, true);
	} else {
	    $this->allList = $marks[Marks::MARKS_ACCESS_PARTNER];
	    $this->list = $this->model->getUserMarksFromList();
	}
    }
    
    public function run() {
	return $this->render($this->view, [
	    'allList' => $this->allList, 
	    'list' => $this->list,
	    'uId' => $this->model->id,
	]);
    }
}
