<?php

namespace frontend\models;

class Registration extends User {
    
    const REG_STEP_ONE = 1;
    const REG_STEP_TWO = 2;
    const REG_STEP_THREE = 3;
    
    public $regStep = [
	self::REG_STEP_ONE => "Регистрация - Шаг 1<span> из 2</span>",
	self::REG_STEP_TWO => "Регистрация - Шаг 2<span> из 2</span>",
	self::REG_STEP_THREE => "Регистрация - Шаг 2<span> из 2</span>",
    ];

    public function rules() {
	return [
	    [['first_name', 'last_name', 'email', 'city_id'], 'required'],
	    [['company_id', 'profileviews', 'rating'], 'integer'],
	    [['email'], 'unique'],
	    [['last_login', 'birthdate', 'city_id', 'phone', 'site', 'mark', 'email', 'professionField', 'type', 'step'], 'safe'],
	    [['image'], 'string', 'max' => 255],
	    [['first_name', 'last_name', 'about'], 'string', 'max' => 50],
	];
    }

}
