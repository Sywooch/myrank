<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\user;

use yii\base\Widget;

class ProfileStatWidget extends Widget {
    
    public $view;
    public $model;

    public function init() {
        parent::init();
        $this->view = "profileStat";
    }

    public function run() {
        parent::run();
        
        return $this->render($this->view, ['model' => $this->model]);
    }

}
