<?php

namespace frontend\widgets\user;

use yii\base\Widget;

class TestimonialsWidget extends Widget {
    
    public $model;
    public $list = [];
    
    public function init() {
	parent::init();
	$this->list = $this->model->getTestimonials()->andWhere(['parent_id' => 0])->all();
    }
    
    public function run() {
	parent::run();
	return $this->render("testimonials", [
	    'list' => $this->list, 
	    'mUser' => $this->model
	]);
    }
}
