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

    public $name1;
    public $name2;
    public $name3;
    public $name4;
    public $name5;

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
	    [['user_id'], 'required'],
	    [['name'], 'string', 'max' => 255],
	    [['name1', 'name2', 'name3', 'name4', 'name5', 'title', 'description'], 'safe']
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'user_id' => Yii::t('app', 'User ID'),
	    'name' => Yii::t('app', 'Image Name'),
	    'userFullName' => Yii::t('app', 'User Full Name')
	];
    }

    public function beforeSave($insert) {
	if(isset($this->name1)) $this->name = $this->name1;
	if(isset($this->name2)) $this->name = $this->name2;
	if(isset($this->name3)) $this->name = $this->name3;
	if(isset($this->name4)) $this->name = $this->name4;
	if(isset($this->name5)) $this->name = $this->name5;
	return parent::beforeSave($insert);
    }

    public function getUser() {
	return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserFullName() {
	return $this->user->fullName;
    }

}
