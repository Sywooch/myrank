<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $name
 */
class Images extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['name'], 'string', 'max' => 255],
	    [['user_id'], 'safe']
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
        'user_id'=> Yii::t('app', 'User ID'),
	    'name' => Yii::t('app', 'Image Name'),
        'userFullName' => Yii::t('app','User Full Name')
	];
    }
    
    public function beforeSave($insert) {
	$this->user_id = Yii::$app->user->id;
	return parent::beforeSave($insert);
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserFullName() {

        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : 'Нет пользователя';
    }
}
