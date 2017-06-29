<?php

namespace frontend\widgets\user;

use frontend\models\Marks;
use yii\helpers\Json;

class MarksDiagramWidget extends MarksWidget {
    
    public $model;
    public $view = "marksDiagram_new";
    public $allList;
    public $list;
    public $userList;


    public function init() {
	parent::init();
	$out = [];
	
	$markUsers = $this->model->getUserMarksTo()->select('description')->asArray()->all();
	foreach ($markUsers as $item) {
	    $arr = Json::decode($item['description'], true);
	    if(isset($arr[0])) {
		foreach ($arr[0] as $key => $el) {
		    if(isset($out[$key])) {
			$out[$key] += (($el != 0.0) ? $el / count($markUsers) : $el);
		    } else {
			$out[$key] = (($el != 0.0) ? $el / count($markUsers) : $el);
		    }
		}
	    }
	}
        $this->userList = isset($this->model->mark) ? Json::decode($this->model->mark, TRUE) : [];
	$this->list = $out;
    }
    
    public function run() {
	return $this->render($this->view, [
            'allList' => $this->allList,
            'list' => $this->list,
            'userList' => $this->userList[0]
        ]);
    }
}