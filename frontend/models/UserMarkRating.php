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
	    'user_from' => Yii::t('app', 'User From'),
	    'user_to' => Yii::t('app', 'User To'),
	    'mark_id' => Yii::t('app', 'Mark ID'),
	    'mark_val' => Yii::t('app', 'Mark Val'),
	];
    }

}
