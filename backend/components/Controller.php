<?php

namespace backend\components;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class Controller extends \yii\web\Controller {

    public function init() {
	parent::init();
	Yii::$app->language = 'ru_RU'; // 'ru_RU' | 'en_US' | 'ua_UA'
    }

}
