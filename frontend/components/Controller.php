<?php

namespace frontend\components;

use Yii;
use frontend\models\User;
use yii\helpers\Json;
use frontend\models\UserConstant;

class Controller extends \yii\web\Controller {

    public $files = DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR;
    public $userImageUrl;
    public $userImagePath;
    private $fromRequestHeader;
    private $langFromRequest;

    public function init() {
	parent::init();
	$this->checkLang();

        if(Yii::$app->user->id !== null) {
            $mObj = Yii::$app->user->identity;
            $this->userImagePath = Yii::getAlias('@frontend/web') . $this->files . DIRECTORY_SEPARATOR . $mObj->saveFolder . DIRECTORY_SEPARATOR;
        }
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
    
    public function checkUserHits ($objId, $type) {
        return true; // Пока отключена
        
        $session = Yii::$app->session;
        $userViewArr = [];
        $out = false;
        
        if(\Yii::$app->user->id !== NULL) {
            $mObj = UserConstant::getProfile();
            if(($mObj->objId == $objId) && ($mObj->objType == $type)) {
                return false;
            }
        }
        /*
        switch ($type) {
            case UserConstant::TYPE_USER_USER:
                $prefix = 'user';
                break;
            case UserConstant::TYPE_USER_COMPANY:
                $prefix = 'company';
                break;
        }*/
        
        $element = implode("-", [$objId, $type]);
        //var_dump($element);
        
        if($session->has('userView')) {
            $userViewArr = Json::decode($session->get('userView'), true);
            if(array_search($element, $userViewArr) === FALSE) {
                $userViewArr[] = $element;
                $out = TRUE;
            } else {
                return $out;
            }
        } else {
            $userViewArr[] = $element;
            $out = TRUE;
        }
        $session->set("userView", Json::encode($userViewArr));
        return $out;
    }
    
    public function beforeAction($action) {
        return parent::beforeAction($action);
    }

}
