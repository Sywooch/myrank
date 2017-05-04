<?php

namespace frontend\components;

use Yii;
use frontend\models\User;

class Controller extends \yii\web\Controller {
    
    public $files = DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR;
    public $userImageUrl;
    public $userImagePath;

    private $fromRequestHeader;
    private $langFromRequest;

    public function init() {
	parent::init();
	
	$this->userImagePath = Yii::getAlias('@frontend/web') . $this->files;

    $this->fromRequestHeader = Yii::$app->request->headers->get('Accept-Language');
    if($this->fromRequestHeader !== null && isset($this->fromRequestHeader))
    {
        $this->langFromRequest =
            str_replace(
                "-", "_", substr( $this->fromRequestHeader, 0, 5)
            );
        if($this->langFromRequest == 'uk_UA')
            $this->langFromRequest = 'ua_UA';
        if(array_key_exists($this->langFromRequest,Yii::$app->params['lang']))
            Yii::$app->language = $this->langFromRequest; // 'ua_UA', 'ru_RU', 'en_US'
        else
            Yii::$app->language = 'ru_RU';
    } else {
        Yii::$app->language = 'ru_RU';
    }
	
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
	
	/*if($cookies->has('lang')) {
	    \Yii::$app->language = $cookies->get('lang');
	} else {
	    \Yii::$app->language = 'ru_RU';
	}*/
    }

}
