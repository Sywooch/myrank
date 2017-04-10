<?php

namespace backend\components;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class Controller extends \yii\web\Controller {

    public function init()
    {
        parent::init();
        Yii::$app->language = 'ua-UA'; // 'ru-RU' | 'en-US' | 'ua-UA'
    }
}


