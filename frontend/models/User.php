<?php

namespace frontend\models;

use Yii;
use yii\web\IdentityInterface;
use yii\helpers\Json;
use frontend\models\UserTrustees;

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
class User extends \yii\db\ActiveRecord implements IdentityInterface {
    
    const LIMIT_VIEW = 10;

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
    private $_user;
    public $country_id;
    public $profession;
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
	    [['account_id', 'company_id', 'profileviews', 'rating'], 'integer'],
	    [['last_login', 'birthdate', 'city_id', 'phone', 'site', 'mark', 'email', 'profession'], 'safe'],
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
	    'first_name' => Yii::t('app', 'Имя'),
	    'last_name' => Yii::t('app', 'Фамилия'),
	    'about' => Yii::t('app', 'About'),
	    'last_login' => Yii::t('app', 'Last Login'),
	    'rating' => Yii::t('app', 'Рейтинг'),
	    'birthdate' => Yii::t('app', 'День рождения'),
	    'gender' => Yii::t('app', 'Пол'),
	    'city_id' => \Yii::t('app', 'Город'),
	    'phone' => \Yii::t('app', 'Номер телефона'),
	    'site' => \Yii::t('app', 'Сайт'),
	    'mark' => \Yii::t('app', 'Оценка'),
	    'password' => \Yii::t('app', 'Пароль'),
	    'rePassword' => \Yii::t('app', 'Повторите пароль'),
	];
    }

    // Связи
    public function getCity() {
	return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    public function getImages() {
	return $this->hasMany(Images::className(), ['user_id' => 'id']);
    }

    public function getTestimonials() {
	return $this->hasMany(Testimonials::className(), ['user_to' => 'id']);
    }
    
    public function getUserTrusteesTo () {
	return $this->hasMany(UserTrustees::className(), ['user_to' => 'id']);
    }
    
    public function getUserTrusteesFrom () {
	return $this->hasMany(UserTrustees::className(), ['user_from' => 'id']);
    }
    
    public function getUserMarkRatingTo () {
	return $this->hasMany(UserMarkRating::className(), ['user_to' => 'id']);
    }
    
    public function getProfession () {
	return $this->hasMany(UserProfession::className(), ['user_id' => 'id']);
    }

    //

    public function getFullName() {
	return $this->first_name . " " . $this->last_name;
    }

    public function getCityList() {
	$city = City::find()->where(['country_id' => 3159])->orderBy("name")->all();
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

    public function getCountryName() {
	return ($this->city_id == 0) ? FALSE : $this->getCity()->one()->countryName;
    }

    public function getPosition() {
	return $this->getCityName() && $this->getCountryName() ? $this->getCityName() . ", " . $this->getCountryName() : FALSE;
    }

    // Marks

    public function getMarks() {
	$model = Marks::find()->all();
	foreach ($model as $item) {
	    $arr[$item->parent_id][$item->id] = $item->name;
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
	foreach ($model as $item) {
	    $arr[$item->id] = $item->title;
	}
	return $arr;
    }
    
    public function getUserImage () {
	return $this->image == "" ? "/images/no_photo.png" : $this->image;
    }

    public function getOwner() {
	return (\Yii::$app->user->id === NULL) ? FALSE : (\Yii::$app->user->id == $this->id) ? TRUE : FALSE;
    }
    
    public function getTrustUser () {
	$id = \Yii::$app->user->id;
	return $this->getUserTrusteesTo()->andWhere(['user_from' => $id])->count() > 0 ? TRUE : FALSE;
    }

    public function beforeSave($insert) {
	if(isset($this->profession)) {
	    UserProfession::deleteAll(['user_id' => $this->id]);
	    foreach ($this->profession as $item) {
		$mProf = new UserProfession();
		$mProf->attributes = [
		    'user_id' => $this->id,
		    'profession_id' => $item,
		];
		$mProf->save();
	    }
	}
	Logs::saveLog(var_export($this->profession, true));
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
	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
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
	//return $this->
	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
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
