<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use frontend\models\User;
use frontend\models\UserCompany;

class BestRatingWidget extends Widget {
    
    public $tmpl = 'main';
    
    private $view;
    
    public function init() {
	parent::init();
	$this->view = "bestRating_" . $this->tmpl;
    }
    
    public function run() {
	parent::run();
	$model = UserCompany::find()->joinWith(['company', 'user'])->where(['user.step' => 0])->orderBy("user.rating DESC")->limit(10)->all();
	return $this->render($this->view, ['model' => $model]);
    }
}
