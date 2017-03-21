<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use frontend\models\User;

class BestRatingWidget extends Widget {
    
    public $tmpl = 'main';
    
    private $view;
    
    public function init() {
	parent::init();
	$this->view = "bestRating_" . $this->tmpl;
    }
    
    public function run() {
	parent::run();
	$model = User::find()->orderBy("rating DESC")->limit(10)->all();
	return $this->render($this->view, ['model' => $model]);
    }
}
