<?php

namespace frontend\models;

use Yii;
use yii\web\IdentityInterface;
use yii\helpers\Json;
use frontend\models\UserTrustees;
use frontend\models\Testimonials;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
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
class User extends \yii\db\ActiveRecord implements IdentityInterface {

    const LIMIT_VIEW = 10;
    const ROLE_ACCESS_TYPE_STANDART = 0;
    const ROLE_ACCESS_TYPE_ADVANCED = 1;
    const ROLE_ACCESS_TYPE_PREMIUM = 2;
    const TYPE_USER_USER = 0;
    const TYPE_USER_COMPANY = 1;
    const TYPE_USER_ADMIN = 10;
    const GENDER_DEFAULT = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const STEP_NEXT_NONE = 0;
    const STEP_NEXT_USER = 2;
    const STEP_NEXT_COMPANY = 3;

    public static $roleAccess = [
	self::ROLE_ACCESS_TYPE_STANDART => "standart",
	self::ROLE_ACCESS_TYPE_ADVANCED => "advanced",
	self::ROLE_ACCESS_TYPE_PREMIUM => "premium",
    ];
    public static $typeUser = [
	self::TYPE_USER_USER => "user",
	self::TYPE_USER_COMPANY => "company",
	self::TYPE_USER_ADMIN => "admin",
    ];
    public $genderUser = [
	self::GENDER_DEFAULT => "default",
	self::GENDER_MALE => "Male",
	self::GENDER_FEMALE => "FEMALE"
    ];
    private $_user;
    public $country_id;
    public $professionField;
    public $password;
    public $rePassword;
    public $github;
    public $username;
    public $defMarks = [];

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
	    //[['first_name', 'last_name', 'city_id'], 'required'],
	    [['company_id', 'profileviews', 'rating'], 'integer'],
	    [['last_login', 'birthdate', 'city_id', 'phone',
	    'site', 'mark', 'email', 'professionField',
	    'type', 'step', 'image', 'company_name', 'marks_config'], 'safe'],
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
	    'contact_id' => Yii::t('app', 'CONTACT_ID'),
	    'company_id' => Yii::t('app', 'COMPANY_ID'),
	    'profileviews' => Yii::t('app', 'PROFILE_VIEWS'),
	    'profile_company' => Yii::t('app', 'PROFILE_COMPANY'),
	    'image' => Yii::t('app', 'IMAGE'),
	    'first_name' => Yii::t('app', 'NAME'),
	    'last_name' => Yii::t('app', 'SURNAME'),
	    'about' => Yii::t('app', 'ABOUT'),
	    'last_login' => Yii::t('app', 'LAST_LOGIN'),
	    'rating' => Yii::t('app', 'RATING'),
	    'birthdate' => Yii::t('app', 'BIRTHDATE'),
	    'gender' => Yii::t('app', 'GENDER'),
	    'city_id' => \Yii::t('app', 'CITY_ID'),
	    'cityName' => \Yii::t('app', 'CITY_NAME'),
	    'phone' => \Yii::t('app', 'PHONE'),
	    'site' => \Yii::t('app', 'SITE'),
	    'mark' => \Yii::t('app', 'MARK'),
	    'password' => \Yii::t('app', 'PASSWORD'),
	    'rePassword' => \Yii::t('app', 'CONFIRM_PASSWORD'),
	    'professionField' => \Yii::t('app', 'PROFESSION_FIELD'),
	];
    }

    // Связи
    public function getCity() {
	return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    public function getImages() {
	$value = $this->type ? 'company_id' : 'id';
	return $this->hasMany(Images::className(), ['type_id' => $value])->andWhere(['type' => $this->type]);
    }

    public function getTestimonials() {
	return $this->hasMany(Testimonials::className(), ['user_to' => 'id']);
    }

    public function getTestimonialsActive() {
	return $this->getTestimonials()->andWhere(['status' => Testimonials::STATUS_ACTIVE]);
    }

    public function getTestimonialsTo() {
	return $this->hasMany(Testimonials::className(), ['user_to' => 'id']);
    }

    public function getTestimonialsFrom() {
	return $this->hasMany(Testimonials::className(), ['user_from' => 'id']);
    }

    public function getUserTrusteesTo() {
	return $this->hasMany(UserTrustees::className(), ['user_to' => 'id']);
    }

    public function getUserTrusteesFrom() {
	return $this->hasMany(UserTrustees::className(), ['user_from' => 'id']);
    }

    public function getUserMarkRatingTo() {
	return $this->hasMany(UserMarkRating::className(), ['user_to' => 'id']);
    }

    public function getProfession() {
	return $this->hasMany(UserProfession::className(), ['user_id' => 'id']);
    }

    public function getUserProfession() {
	return $this->hasMany(Profession::className(), ['id' => 'profession_id'])->via("profession");
    }

    public function getCompany() {
	return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    //
    
    public function getProfileProfession () {
	switch ($this->type) {
	    case self::TYPE_USER_COMPANY:
		$out = $this->company->companyProfession;
		break;
	    case self::TYPE_USER_USER:
		$out = $this->userProfession;
		break;
	}
	return $out;
    }

    public function getFullName() {
	if ($this->type && $this->company->name != "") {
	    return $this->company->name;
	}
	return $this->first_name . " " . $this->last_name;
    }

    public function getCityList($id = 3159) {
	$city = City::find()->where(['country_id' => $id])->orderBy("name")->all();
	foreach ($city as $item) {
	    $arr[$item->city_id] = $item->name;
	}
	return $arr;
    }

    public function getCityName() {
	return ($this->city_id == 0) ? FALSE : $this->getCity()->one()->name;
    }

    public function getCountries() {
	$model = Country::find()->select(['country_id', 'name'])->orderBy("name ASC")->all();
	foreach ($model as $item) {
	    $out[$item->country_id] = $item->name;
	}
	return $out;
    }

    public function getCountryCity() {
	return $this->city->country_id;
    }

    public function getCountryName() {
	return ($this->city_id == 0) ? FALSE : $this->getCity()->one()->countryName;
    }

    public function getPosition() {
	return $this->getCityName() && $this->getCountryName() ? $this->getCityName() . ", " . $this->getCountryName() : ((string) \Yii::t('app','NOT_LISTED') );
    }
    
    public function getProfilePosition () {
	switch ($this->type) {
	    case self::TYPE_USER_USER:
		$out = $this->position;
		break;
	    case self::TYPE_USER_COMPANY:
		$out = $this->company->position;
		break;
	}
	return $out;
    }

    public function getAboutProfile() {
	return $this->type ? $this->company->about : $this->about;
    }

    // Marks

    public function getConfigMarks() {
	return is_null($this->marks_config) ? [] : Json::decode($this->marks_config, true);
    }

    public function getMarks() {
	$configMarksArr = $this->configMarks;

	$model = Marks::find()->all();
	foreach ($model as $item) {
	    if (isset($configMarksArr[$item->parent_id])) {
		if ($configMarksArr[$item->parent_id] == Marks::MARKS_ACCESS_FRONT_ALL) {
		    $arr[$item->parent_id][$item->id] = $item->name;
		}
	    } else {
		$arr[$item->parent_id][$item->id] = $item->name;
	    }
	}
	return $arr;
    }

    /**
     * Список оценок оставленные пользователю
     * @return type
     */
    public function getUserMarksTo() {
	return $this->hasMany(UserMarks::className(), ['user_to' => 'id']);
    }

    /**
     * Списое оценок оставленных пользователем
     * @return type
     */
    public function getUserMarksFrom() {
	return $this->hasMany(UserMarks::className(), ['user_from' => 'id']);
    }

    public function getUserMarksFromList() {
	$model = $this->getUserMarksTo()->andWhere(['user_from' => \Yii::$app->user->id])->one();
	return isset($model->description) ? Json::decode($model->description, true) : [];
    }

    // Marks End
    public function getProfList() {
	$model = Profession::find()->orderBy("title")->all();
	$arr[""] = 'Все';
	foreach ($model as $item) {
	    $arr[$item->id] = $item->title;
	}
	return $arr;
    }

    public function getUserImage() {
	return $this->image == "" ? "/images/no_photo.png" : \yii\helpers\Url::toRoute([
		    'media/viewimage',
		    'id' => $this->id,
		    'user' => 1
	]);
    }

    // Checkouts
    
    public function getOwner() {
	return (\Yii::$app->user->id === NULL) ? FALSE : (\Yii::$app->user->id == $this->id) ? TRUE : FALSE;
    }
    
    public function getTestimonial () {
	return $this->getTestimonialsTo()->andWhere(['user_from' => \Yii::$app->user->id]);
    }
    
    public function getHasTestimonial () {
	return $this->getTestimonial()->count() > 0;
    }

    public function getTrustUser() {
	$id = \Yii::$app->user->id;
	return $this->getUserTrusteesTo()->andWhere(['user_from' => $id])->count() > 0 ? TRUE : FALSE;
    }

    public function saveProfession() {
	if (isset($this->professionField) && (count($this->professionField) > 0)) {
	    UserProfession::deleteAll(['user_id' => $this->id]);
	    foreach ($this->professionField as $item) {
		$mProf = new UserProfession();
		$mProf->attributes = [
		    'user_id' => $this->id,
		    'profession_id' => $item,
		];
		$mProf->save();
	    }
	}
    }

    /*
      public function getQueryRangeDate ($query) {
      return $query->andWhere([
      'between',
      'created',
      new \yii\db\Expression('(NOW() - INTERVAL 1 DAY)'),
      new \yii\db\Expression('NOW()')
      ])->count();
      }
     */

    public function beforeSave($insert) {
	isset($this->id) ? $this->saveProfession() : NULL;
	return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
	return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
	throw new NotSupportedException('"findIdentityByAccessToken"'.((string) \Yii::t('app','IS_NOT_IMPLEMENTED') ));
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
	return static::findOne(['username' => $username]);
    }

    public static function findByEmail($email) {
	return static::findOne(['email' => $email]);
    }

    public static function getProfile() {
	return static::findOne(\Yii::$app->user->id);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
	if (!static::isPasswordResetTokenValid($token)) {
	    return null;
	}

	return static::findOne(['password_reset_token' => $token]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token) {
	if (empty($token)) {
	    return false;
	}

	$timestamp = (int) substr($token, strrpos($token, '_') + 1);
	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
	return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
	return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
	return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
	return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
	Logs::saveLog(var_export([$this->password_hash, $password], true));
	//return $this->password_hash === sha1($password);
	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
	Logs::saveLog(var_export([sha1($password), $password], true));
	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
	$this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
	$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
	$this->password_reset_token = null;
    }

}
