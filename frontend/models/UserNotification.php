<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_notification".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $user_id
 * @property integer $value
 * @property string $create
 */
class UserNotification extends \yii\db\ActiveRecord {
    
    const NOTIF_TYPE_TRUSTEES = 1;
    const NOTIF_TYPE_MARKS = 2;
    const NOTIF_TYPE_TESTIMONIALS = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'user_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['type', 'user_id', 'value'], 'integer'],
	    [['user_id'], 'required'],
	    [['create'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'type' => Yii::t('app', 'NOTIFICATION_TYPE'),
	    'user_id' => Yii::t('app', 'USER_ID'),
	    'value' => Yii::t('app', 'VALUE'),
	    'create' => Yii::t('app', 'CREATED'),
	];
    }

}
