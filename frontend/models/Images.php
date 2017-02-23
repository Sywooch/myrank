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
	    'name' => Yii::t('app', 'Name'),
	];
    }
    
    public function beforeSave($insert) {
	$this->user_id = Yii::$app->user->id;
	return parent::beforeSave($insert);
    }

}
