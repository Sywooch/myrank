<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $type_id
 * @property integer $user_id
 * @property string $name
 */
class Images extends \yii\db\ActiveRecord {

    public $name0;
    public $name1;
    public $name2;
    public $name3;
    public $name4;

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
	    [['type', 'type_id', 'user_id'], 'required'],
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
	    'type' => Yii::t('app', 'COMPANY_OR_USER_TYPE'),
	    'type_id' => Yii::t('app', 'COMPANY_OR_USER_TYPE_ID'),
	    'name' => Yii::t('app', 'IMAGE_NAME'),
	    'userFullName' => Yii::t('app', 'USER_FULL_NAME')
	];
    }

    public function beforeSave($insert) {
	if(isset($this->name0)) $this->name = $this->name0;
	if(isset($this->name1)) $this->name = $this->name1;
	if(isset($this->name2)) $this->name = $this->name2;
	if(isset($this->name3)) $this->name = $this->name3;
	if(isset($this->name4)) $this->name = $this->name4;
	return parent::beforeSave($insert);
    }

    public function getUser() {
	$model = $this->type_id ? Company::className() : User::className();
	return $this->hasOne($model, ['id' => 'type_id']);
    }

    public function getUserFullName() {
	return $this->user->fullName;
    }

}
