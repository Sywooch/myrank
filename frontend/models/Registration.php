<?php

namespace frontend\models;

class Registration extends User {

    public function rules() {
	return [
	    [['first_name', 'last_name', 'email', 'professionField', 'city_id'], 'required'],
	    [['account_id', 'company_id', 'profileviews', 'rating'], 'integer'],
	    [['last_login', 'birthdate', 'city_id', 'phone', 'site', 'mark', 'email', 'professionField'], 'safe'],
	    [['image'], 'string', 'max' => 255],
	    [['first_name', 'last_name', 'about'], 'string', 'max' => 50],
	];
    }

}
