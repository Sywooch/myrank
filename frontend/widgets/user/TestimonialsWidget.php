<?php

namespace frontend\widgets\user;

use yii\base\Widget;

class TestimonialsWidget extends Widget {
    
    public $model;
    public $list = [];
    
    public function init() {
	parent::init();
    }
    
    public function run() {
	parent::run();
	return $this->render("testimonials", ['list' => $this->list]);
    }
}
