<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\profile;

use frontend\models\UserConstant;

class StatTrusteesWidget extends \frontend\widgets\user\UserTrusteesWidget {
    
    public $model;
    public $list;
    public $count;
    public $countListView = 8;
    
    public function init() {
        return parent::init();
    }
    
    public function run() {
        $title = $this->model->isCompany ? "Доверенные компании" : "Мои доверенные";
        return $this->render("statTrustees", [
            'list' => $this->list,
            'count' => $this->countListView,
            'title' => $title
        ]);
        //parent::run();
    }
}
