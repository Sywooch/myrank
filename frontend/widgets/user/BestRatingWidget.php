<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use frontend\models\User;
use frontend\models\Company;
use frontend\models\UserCompany;

class BestRatingWidget extends Widget {
    
    public $tmpl = 'main';
    public $type = 'user';
    
    private $view;
    private $model;
    private $title;
    
    public function init() {
	parent::init();
	$this->view = "bestRating_" . $this->tmpl;
        switch ($this->type) {
            case 'user':
                $model = User::find();
                $this->title = \Yii::t('app', 'RATING_FROM_USERS');
                break;
            case 'company':
                $model = Company::find();
                $this->title = \Yii::t('app', 'RATING_FROM_COMPANY');
                break;
        }
        $this->model = $model->orderBy('rating DESC')->limit(5)->all();
    }
    
    public function run() {
	parent::run();
	//$model = UserCompany::find()->joinWith(['company', 'user'])->where(['user.step' => 0])->orderBy("user.rating DESC")->limit(10)->all();
	return $this->render($this->view, [
            'model' => $this->model,
            'title' => $this->title
        ]);
    }
}
