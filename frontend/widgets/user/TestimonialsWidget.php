<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use frontend\models\Testimonials;

class TestimonialsWidget extends Widget {
    
    const MAIN_PARENT = 0;
    
    public $model;
    public $list = [];
    
    public function init() {
	parent::init();
	$this->list = $this->model->getTestimonialsActive()
		->andWhere([
		    'parent_id' => self::MAIN_PARENT
		])->all();
    }
    
    public function run() {
	parent::run();
	return $this->render("testimonials", [
	    'list' => $this->list, 
	    'mObj' => $this->model
	]);
    }
}
