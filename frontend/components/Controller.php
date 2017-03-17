<?php

namespace frontend\components;

use Yii;
use frontend\models\User;

class Controller extends \yii\web\Controller {
    
    public $files = DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR;
    
    public function init() {
	parent::init();
	
	$session = Yii::$app->session;
	$cookies = Yii::$app->request->cookies;
	
	if($session->has('country') && !$cookies->has('country')) {
	    $country = $session->get('country');
	    $cookies = Yii::$app->response->cookies;
	    $cookies->add(new \yii\web\Cookie([
		'name' => 'country',
		'value' => $country,
		'path' => "/",
		'domain' => 'myrankf.site4ever.com',
		'expire' => time() + 365 * 24 * 60 * 60,
	    ]));
	} else if(!$session->has("country") && $cookies->has("country")) {
	    $session->set("country", $cookies->getValue('country'));
	}
    }

}
