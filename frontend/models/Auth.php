<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auth".
 *
 * @property integer $id_auth
 * @property integer $user_id
 * @property string $provider
 * @property string $uid
 * @property string $access_token
 * @property string $secret
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $expires
 * @property string $refresh_token
 * @property string $link
 * @property string $verifed
 * @property string $photo_url
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at', 'expires'], 'integer'],
            [['access_token', 'secret'], 'string'],
            [['provider'], 'string', 'max' => 50],
            [['uid', 'refresh_token', 'link', 'photo_url'], 'string', 'max' => 255],
            [['verifed'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_auth' => Yii::t('app', 'Id Auth'),
            'user_id' => Yii::t('app', 'User ID'),
            'provider' => Yii::t('app', 'Provider'),
            'uid' => Yii::t('app', 'Uid'),
            'access_token' => Yii::t('app', 'Access Token'),
            'secret' => Yii::t('app', 'Secret'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'expires' => Yii::t('app', 'Expires'),
            'refresh_token' => Yii::t('app', 'Refresh Token'),
            'link' => Yii::t('app', 'Link'),
            'verifed' => Yii::t('app', 'Verifed'),
            'photo_url' => Yii::t('app', 'Photo Url'),
        ];
    }
}
