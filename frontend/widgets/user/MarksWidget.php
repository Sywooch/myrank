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
    private $title;

    public function init() {
	parent::init();
	$this->allList = $this->model->marks;
	if($this->model->owner) {
	    $this->title = \Yii::t('app','MARK_MINE');
	    $this->list = Json::decode($this->model->mark, true);
	} else {
	    $this->title = \Yii::t('app','MARK');
	    $this->list = $this->model->getUserMarksFromList();
	}
    }
    
    public function run() {
	return $this->render($this->view, [
	    'allList' => $this->allList, 
	    'list' => $this->list,
	    'uId' => $this->model->id,
	    'title' => $this->title,
	]);
    }
}
