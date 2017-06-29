<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\profile;

use yii\base\Widget;

class StatTestimonialsWidget extends \frontend\widgets\user\TestimonialsWidget {
    
    public $model;
    
    public function init() {
        return parent::init();
    }
    
    public function run() {
        return $this->render("statTestimonials", ['list' => $this->list, 'mObj' => $this->model]);
    }
}
