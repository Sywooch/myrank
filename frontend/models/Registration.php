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
	    [['first_name', 'last_name', 'email', 'city_id', 'professionField', 'password'], 'required'],
	    [['first_name', 'last_name'], 'match', 'pattern' => '/^[A-Za-zА-Яа-яs,]+$/u'],
	    [['email'], 'email'],
	    [['company_id', 'profileviews', 'rating'], 'integer'],
	    [['email'], 'unique', 'on' => 'step1'],
	    [['last_login', 'birthdate', 'city_id', 'phone', 'site', 'mark', 'type', 'step'], 'safe'],
	    [['image'], 'string', 'max' => 255],
	    [['first_name', 'last_name', 'about'], 'string', 'max' => 50],
	];
    }

}
