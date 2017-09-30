<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models\registration;

use yii\helpers\Url;
use yii\helpers\Html;

class RegStep1 extends \frontend\models\Registration {

    public function rules() {
        return [
            [['first_name', 'last_name', 'email', 'city_id', 'professionField', 'password'], 'required'],
            [['password'], 'string', 'length' => [6, 24]],
            [['first_name', 'last_name'], 'match', 'pattern' => '/^[A-Za-zА-Яа-яs,]+$/u'],
            [['email'], 'email'],
            [['profileviews', 'rating'], 'integer'],
            [['email'], 'unique'],
            [['last_login', 'birthdate', 'city_id', 'phone', 'site', 'mark', 'type', 'step', 'about'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['first_name', 'last_name'], 'string', 'max' => 50],
        ];
    }
    
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'legal' => \Yii::t('app', 'ACCEPT_LEGAL'),
        ]);
    }

}
