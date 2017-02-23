<?php

namespace frontend\widgets\user;

use frontend\models\Marks;
use yii\helpers\Json;

class MarksDiagramWidget extends MarksWidget {
    
    public $model;
    public $view = "marksDiagram";
    public $allList;
    public $list;


    public function init() {
	parent::init();
	$marks = $this->model->marks;
	$this->allList = $marks[Marks::MARKS_ACCESS_USER];
	$this->list = Json::decode($this->model->mark, true);
    }
    
    public function run() {
	return parent::run();
    }
}