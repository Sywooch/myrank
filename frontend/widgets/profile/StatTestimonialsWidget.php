<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\profile;

use yii\base\Widget;

class StatTestimonialsWidget extends \frontend\widgets\user\TestimonialsWidget {
    
    public $model;
    public $countListView = 8;
    
    public function init() {
        return parent::init();
    }
    
    public function run() {
        $title = $this->model->isCompany ? "" : "";
        return $this->render("statTestimonials", [
            'list' => $this->list, 
            'mObj' => $this->model,
            'title' => $title,
            'countListView' => $this->countListView
        ]);
    }
}
