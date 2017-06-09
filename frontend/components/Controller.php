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
	$this->checkLang();

	$this->userImagePath = Yii::getAlias('@frontend/web') . $this->files;

	//Yii::$app->request->headers->set('Accept-Language','ru-RU');

	$session = Yii::$app->session;
	$cookies = Yii::$app->request->cookies;

	if ($session->has('country') && !$cookies->has('country')) {
	    $country = $session->get('country');
	    $cookies = Yii::$app->response->cookies;
	    $cookies->add(new \yii\web\Cookie([
		'name' => 'country',
		'value' => $country,
		'path' => "/",
		'domain' => 'myrank.com',
		'expire' => time() + 365 * 24 * 60 * 60,
	    ]));
	} else if (!$session->has("country") && $cookies->has("country")) {
	    $session->set("country", $cookies->getValue('country'));
	}

	if ($cookies->has('lang')) {
	    \Yii::$app->language = $cookies->get('lang')->value;
	}/* else {
	  \Yii::$app->language = 'ru_RU';
	  } */ 
    }
    
    public function checkLang () {
	$this->fromRequestHeader = Yii::$app->request->headers->get('Accept-Language');
	if ($this->fromRequestHeader !== null && isset($this->fromRequestHeader)) {
	    $this->langFromRequest = str_replace("-", "_", substr($this->fromRequestHeader, 0, 5));
	    if ($this->langFromRequest == 'uk_UA')
		$this->langFromRequest = 'ua_UA';
	    if (array_key_exists($this->langFromRequest, Yii::$app->params['lang']))
		Yii::$app->language = $this->langFromRequest;
	    else
		Yii::$app->language = 'en_US';
	} else {
	    Yii::$app->language = 'en_US';
	}
    }

}
