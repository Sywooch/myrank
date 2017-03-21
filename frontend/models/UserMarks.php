<?php

namespace frontend\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "user_marks".
 *
 * @property integer $id
 * @property integer $user_to
 * @property integer $user_from
 * @property string $description
 * @property string $created
 */
class UserMarks extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'user_marks';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['user_to', 'user_from'], 'integer'],
	    [['description'], 'string'],
	    [['created'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => 'ID',
	    'user_to' => 'User To',
	    'user_from' => 'User From',
	    'description' => 'Description',
	    'created' => 'Created',
	];
    }
    
    public function getUser () {
	return $this->hasOne(User::className(), ['id' => 'user_from']);
    }
    
    public function getDescrArr () {
	$out = Json::decode($this->description, true);
	return $out[0];
    }

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

}
