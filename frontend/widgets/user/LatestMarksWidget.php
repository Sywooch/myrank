<?php

namespace frontend\widgets\user;

use frontend\models\UserMarks;

class LatestMarksWidget extends \yii\base\Widget {
    
    public $model;
    private $list;
    private $marks;
    private $count;

    public function init() {
	parent::init();
	$query = $this->model->getUserMarksTo();
	$model = clone $query;
	$this->marks = $this->model->marks;
	$this->list = $query->limit(UserMarks::COUNT_LIST_USER_PROFILE)->all();
	$this->count = $model->count();
    }
    
    public function run() {
	parent::run();
	return $this->render("latestMarks", [
	    'model' => $this->model,
	    'list' => $this->list,
	    'marks' => $this->marks[0],
	    'count' => $this->count
	]);
    }
}