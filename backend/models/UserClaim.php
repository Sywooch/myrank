<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_claim".
 *
 * @property integer $id
 * @property string $obj
 * @property integer $obj_id
 * @property integer $user_id
 * @property string $created
 */
class UserClaim extends \yii\db\ActiveRecord {
    
    const OBJ_TYPE_TESTIMONIALS = 1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'user_claim';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['obj', 'obj_id'], 'required'],
	    [['obj_id', 'user_id'], 'integer'],
	    [['user_type'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'obj' => Yii::t('app', 'OBJ'),
	    'obj_id' => Yii::t('app', 'OBJ_ID'),
	    'user_id' => Yii::t('app', 'USER_ID'),
	    'created' => Yii::t('app', 'CREATED'),
	];
    }

    public function getUser () {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserFullName() {
        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : ((string) \Yii::t('app','NO_USER') );
    }
}
