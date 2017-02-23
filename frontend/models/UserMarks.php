<?php

namespace frontend\models;

use Yii;

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

}
