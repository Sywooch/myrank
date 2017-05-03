<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_mark_rating".
 *
 * @property integer $id
 * @property integer $user_from
 * @property integer $user_to
 * @property integer $mark_id
 * @property double $mark_val
 */
class UserMarkRating extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'user_mark_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['user_from', 'user_to', 'mark_id'], 'integer'],
	    [['mark_val'], 'number'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'user_from' => Yii::t('app', 'USER_FROM'),
        'fullNameFrom' => Yii::t('app', 'USER_FROM_FULLNAME'),
	    'user_to' => Yii::t('app', 'USER_TO'),
        'fullNameTo' => Yii::t('app', 'USER_TO_FULLNAME'),
	    'mark_id' => Yii::t('app', 'MARK_ID'),
        'marks1Name' =>Yii::t('app', 'MARKS_NAME'),
	    'mark_val' => Yii::t('app', 'MARK_VAL'),
	];
    }
    
    public function getUserTo () {
	return $this->hasOne(User::className(), ['id' => 'user_to'])->from(User::tableName() . ' AS userTo');;
    }
    
    public function getUserFrom () {
	return $this->hasOne(User::className(), ['id' => 'user_from'])->from(User::tableName() . ' AS userFrom');
    }

    public function getFullNameFrom() {
        return $this->userFrom ? ($this->userFrom->first_name.' '.$this->userFrom->last_name) : ((string) \Yii::t('app','NO_USER') );
    }

    public function getFullNameTo() {
        return $this->userTo ? ($this->userTo->first_name.' '.$this->userTo->last_name) : ((string) \Yii::t('app','NO_USER') );
    }

    public function getMarks1 () {
        return $this->hasOne(Marks1::className(), ['id' => 'mark_id'])->from(Marks1::tableName() . ' AS marks1');;
    }

    public function getMarks1Name() {
        return $this->marks1 ? ($this->marks1->name) : ((string) \Yii::t('app','MARK_NO') );
    }
}
