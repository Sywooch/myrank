<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\profile;

class StatTrusteesWidget extends \frontend\widgets\user\UserTrusteesWidget {
    
    public $model;
    public $list;
    public $count;
    public $countListView = 8;
    
    public function init() {
        return parent::init();
    }
    
    public function run() {
        return $this->render("statTrustees", [
            'list' => $this->list,
        ]);
        //parent::run();
    }
}
