<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_trustees".
 *
 * @property integer $id
 * @property integer $user_to
 * @property integer $user_from
 * @property integer $back
 * @property string $created
 */
class UserTrustees extends \yii\db\ActiveRecord {
    
    const BACK_TRUSTEES_YES = 1;
    const BACK_TRUSTEES_NO = 0;
    
    const COUNT_LIST_USER_PROFILE = 5;

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'user_trustees';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['user_to', 'user_from'], 'required'],
	    [['user_to', 'user_from'], 'integer'],
	    [['created'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'user_to' => Yii::t('app', 'User To'),
	    'user_from' => Yii::t('app', 'User From'),
	    'created' => Yii::t('app', 'Created'),
	];
    }
    
    public function getUser () {
	return $this->hasOne(User::className(), ['id' => 'user_to']);
    }
    /*
    public function getUserTo () {
	return $this->hasOne(User::className(), ['id' => 'user_to']);
    }*/

    public function getUserFrom() {
        return $this->hasOne(User::className(), ['id' => 'user_from'])->from(User::tableName() . ' AS userFrom');
    }

    public function getUserTo() {
        return $this->hasOne(User::className(), ['id' => 'user_to'])->from(User::tableName() . ' AS userTo');
    }

    public function getFullNameFrom() {
        return $this->userFrom ? ($this->userFrom->first_name.' '.$this->userFrom->last_name) : 'Нет пользователя';
    }

    public function getFullNameTo() {
        return $this->userTo ? ($this->userTo->first_name.' '.$this->userTo->last_name) : 'Нет пользователя';
    }
    
    public function getMarks () {
	return "Hello";
    }


}
