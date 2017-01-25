<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_profession".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $profession_id
 */
class UserProfession extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'user_profession';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['user_id', 'profession_id'], 'integer'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'user_id' => Yii::t('app', 'User ID'),
	    'profession_id' => Yii::t('app', 'Profession ID'),
	];
    }
    
    public function getProfession () {
	return $this->hasOne(Profession::className(), ['id' => 'profession_id']);
    }
    
    public function getUser () {
	return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
