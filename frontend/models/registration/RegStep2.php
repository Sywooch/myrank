<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models\registration;

class RegStep2 extends \frontend\models\Registration {
    
    public function rules() {
	return [
	    //[['company_post'], 'required'],
	    [['company_post'], 'match', 'pattern' => '/^[A-Za-zА-Яа-яs,]+$/u'],
	    [['phone', 'about', 'step'], 'safe']
	];
    }
    
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'company_post' => 'Должность в компании',
            'company_name' => 'Название компании' 
        ]);
    }
}
