<?php

namespace frontend\widgets\user;

use frontend\models\Marks;

class LatestMarksWidget extends \yii\base\Widget {
    
    public $model;
    private $list;
    private $marks;
    private $keys;


    public function init() {
	parent::init();
	$marks = $this->model->marks;
	$this->marks = $marks[Marks::MARKS_ACCESS_PARTNER];
	//$this->keys = array_keys($this->marks);
	$this->list = $this->model->getUserMarksTo()->limit(10)->all();
    }
    
    public function run() {
	parent::run();
	return $this->render("latestMarks", [
	    'model' => $this->list,
	    'marks' => $this->marks[0],
	]);
    }
}