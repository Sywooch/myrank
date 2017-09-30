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
        parent::init();
        $query = $this->model->getUserTrusteesList();
	$model = clone $query;
	$this->list = $query->limit($this->countListView)->all();
	$this->count = $model->count();
    }
    
    public function run() {
        $title = $this->model->isCompany ? \Yii::t('app', 'TRUSTED_COMPANY') : \Yii::t('app', 'MY_TRUSTEES');
        return $this->render("statTrustees", [
            'list' => $this->list,
            'count' => $this->countListView,
            'title' => $title
        ]);
        //parent::run();
    }
}
