<?php

namespace frontend\components;

use yii\base\Component;
use yii\base\Object;
use frontend\models\Country;
use Yii;

class UserInfo extends Component {

    public $country;
    public $sess;
    public $cooks;
    
    public function __construct($config = array()) {
	$this->sess = Yii::$app->session;
	//$this->cooks = 
	
	parent::__construct($config);
    }
    
    public function getCountry() {
    }
    
    public function getCityArr() {
	$country = $this->sess->get("country", $this->country);
	return Country::findOne($country)->cityArr;
    }

}
