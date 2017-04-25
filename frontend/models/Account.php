<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id_account
 * @property integer $role_user_id
 * @property integer $role_access_id
 * @property string $page
 * @property string $email
 * @property string $password_hash
 * @property string $password_salt
 * @property string $password_reset_code
 * @property string $password_reset_code_expires
 * @property string $user_auth_token
 * @property string $auth_key
 * @property integer $active
 * @property string $create_date
 * @property integer $status
 * @property string $locale
 * @property integer $timezone
 */
class Account extends User {
    
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['role_user_id', 'role_access_id', 'active', 'status', 'timezone'], 'integer'],
	    [['password_reset_code_expires', 'create_date'], 'safe'],
	    [['page'], 'string', 'max' => 255],
	    [['email', 'user_auth_token'], 'string', 'max' => 50],
	    [['password_hash', 'password_salt'], 'string', 'max' => 60],
	    [['password_reset_code'], 'string', 'max' => 4],
	    [['auth_key'], 'string', 'max' => 32],
	    [['locale'], 'string', 'max' => 30],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id_account' => Yii::t('app', 'ACCOUNT_ID'),
	    'role_user_id' => Yii::t('app', 'ROLE_USER_ID'),
	    'role_access_id' => Yii::t('app', 'ROLE_ACCESS_ID'),
	    'page' => Yii::t('app', 'PAGE'),
	    'email' => Yii::t('app', 'EMAIL'),
	    'password_hash' => Yii::t('app', 'PASSWORD_HASH'),
	    'password_salt' => Yii::t('app', 'PASSWORD_SALT'),
	    'password_reset_code' => Yii::t('app', 'PASSWORD_RESET_CODE'),
	    'password_reset_code_expires' => Yii::t('app', 'PASSWORD_RESET_CODE_EXPIRES'),
	    'user_auth_token' => Yii::t('app', 'USER_AUTH_TOKEN'),
	    'auth_key' => Yii::t('app', 'AUTH_KEY'),
	    'active' => Yii::t('app', 'ACTIVE'),
	    'create_date' => Yii::t('app', 'CREATE_DATE'),
	    'status' => Yii::t('app', 'STATUS'),
	    'locale' => Yii::t('app', 'LOCALE'),
	    'timezone' => Yii::t('app', 'TIMEZONE'),
	];
    }


}
