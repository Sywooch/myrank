<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

class UserMainInfoForm extends User {

    public function rules() {
        return [
            [['first_name', 'last_name', 'email', 'city_id', 'professionField'], 'required'],
            [['first_name', 'last_name'], 'match', 'pattern' => '/^[A-Za-zА-Яа-яs,]+$/u'],
            [['email'], 'email'],
            [['company_id', 'profileviews', 'rating'], 'integer'],
            [
                [
                    'last_login', 'company_name', 'birthdate',
                    'city_id', 'phone', 'site',
                    'mark', 'type', 'step',
                    'about'
                ],
                'safe'
            ],
            [['image'], 'string', 'max' => 255],
            [['first_name', 'last_name'], 'string', 'max' => 50],
        ];
    }

}
