<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $account_id
 * @property integer $contact_id
 * @property integer $company_id
 * @property integer $profileviews
 * @property integer $type
 * @property string $image
 * @property string $first_name
 * @property string $last_name
 * @property string $about
 * @property string $last_login
 * @property integer $rating
 * @property string $birthdate
 * @property string $gender
 * @property integer $city_id
 * @property string $phone
 * @property string $site
 * @property string $way
 * @property string $mark
 */
class User extends \yii\db\ActiveRecord {
    
    const ROLE_USER_TYPE_USER = 0;
    const ROLE_USER_TYPE_MODERATOR = 1;
    const ROLE_USER_TYPE_ADMIN = 10;
    
    const ROLE_ACCESS_TYPE_STANDART = 0;
    const ROLE_ACCESS_TYPE_ADVANCED = 1;
    const ROLE_ACCESS_TYPE_PREMIUM = 2;
    
    const TYPE_USER_USER = 0;
    const TYPE_USER_COMPANY = 1;
    
    const GENDER_DEFAULT = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    
    public static $roleUser = [
	self::ROLE_USER_TYPE_USER => "user",
	self::ROLE_USER_TYPE_MODERATOR => "moderator",
	self::ROLE_USER_TYPE_ADMIN => "admin"
    ];
    
    public static $roleAccess = [
	self::ROLE_ACCESS_TYPE_STANDART => "standart",
	self::ROLE_ACCESS_TYPE_ADVANCED => "advanced",
	self::ROLE_ACCESS_TYPE_PREMIUM => "premium",
    ];
    
    public static $typeUser = [
	self::TYPE_USER_USER => "user",
	self::TYPE_USER_COMPANY => "company",
    ];
    
    public $genderUser = [
	self::GENDER_DEFAULT => "default",
	self::GENDER_MALE => "Male",
	self::GENDER_FEMALE => "FEMALE"
    ];

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return '{{user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['account_id', 'company_id', 'profileviews', 'rating'], 'integer'],
	    [['last_login', 'birthdate', 'city_id', 'phone', 'site', 'mark'], 'safe'],
	    [['image'], 'string', 'max' => 255],
	    [['first_name', 'last_name', 'about'], 'string', 'max' => 50],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'account_id' => Yii::t('app', 'Account ID'),
	    'contact_id' => Yii::t('app', 'Contact ID'),
	    'company_id' => Yii::t('app', 'Company ID'),
	    'profileviews' => Yii::t('app', 'Profileviews'),
	    'profile_company' => Yii::t('app', 'Profile Company'),
	    'image' => Yii::t('app', 'Image'),
	    'first_name' => Yii::t('app', 'First Name'),
	    'last_name' => Yii::t('app', 'Last Name'),
	    'about' => Yii::t('app', 'About'),
	    'last_login' => Yii::t('app', 'Last Login'),
	    'rating' => Yii::t('app', 'Рейтинг'),
	    'birthdate' => Yii::t('app', 'День рождения'),
	    'gender' => Yii::t('app', 'Пол'),
	    'city_id' => \Yii::t('app', 'Город'),
	    'phone' => \Yii::t('app', 'Номер телефона'),
	    'site' => \Yii::t('app', 'Сайт'),
	    'mark' => \Yii::t('app', 'Оценка'),
	];
    }
    
    // Связи
    public function getCity () {
	return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }
    
    public function getImages () {
	return $this->hasMany(Images::className(), ['user_id' => 'id']);
    }
    
    public function getTestimonials () {
	return $this->hasMany(Testimonials::className(), ['user_to' => 'id']);
    }
    
    //
    
    public function getFullName () {
	return $this->first_name." ".$this->last_name;
    }
    
    public function getCityName () {
	return ($this->city_id == 0) ? "Не задано" : $this->getCity()->one()->name;
    }
    
    public function getCountryName () {
	return ($this->city_id == 0) ? "Не задано" : $this->getCity()->one()->countryName;
    }
    
    public function getPosition () {
	return $this->getCityName(). ", " . $this->getCountryName();
    }
    
    public function getMarks () {
	$mMarks = Marks::find()->all();
	foreach ($mMarks as $item) {
	    $arr[$item->parent_id][$item->id] = $item->name;
	}
	return $arr;
    }

}
