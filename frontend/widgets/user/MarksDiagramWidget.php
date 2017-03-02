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
	
	$markUsers = $this->model->getUserMarksTo()->select('description')->asArray()->all();
	$markUsers[]['description'] = $this->model->mark;
	foreach ($markUsers as $item) {
	    $arr = Json::decode($item['description'], true);
	    foreach ($arr[0] as $key => $el) {
		if(isset($out[$key])) {
		    $out[$key] += (($el != 0.0) ? $el / count($markUsers) / 10 : $el);
		} else {
		    $out[$key] = (($el != 0.0) ? $el / count($markUsers) / 10 : $el);
		}
	    }
	}
	$this->list = $out;
    }
    
    public function run() {
	return parent::run();
    }
}