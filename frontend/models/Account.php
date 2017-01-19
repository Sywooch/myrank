<?php

namespace app\models;

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
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
        return [
            'id_account' => Yii::t('app', 'Id Account'),
            'role_user_id' => Yii::t('app', 'Role User ID'),
            'role_access_id' => Yii::t('app', 'Role Access ID'),
            'page' => Yii::t('app', 'Page'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_salt' => Yii::t('app', 'Password Salt'),
            'password_reset_code' => Yii::t('app', 'Password Reset Code'),
            'password_reset_code_expires' => Yii::t('app', 'Password Reset Code Expires'),
            'user_auth_token' => Yii::t('app', 'User Auth Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'active' => Yii::t('app', 'Active'),
            'create_date' => Yii::t('app', 'Create Date'),
            'status' => Yii::t('app', 'Status'),
            'locale' => Yii::t('app', 'Locale'),
            'timezone' => Yii::t('app', 'Timezone'),
        ];
    }
}
