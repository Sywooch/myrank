<?php

namespace frontend\models;

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
	    [['created'], 'safe'],
	    [['obj'], 'string', 'max' => 255],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'obj' => Yii::t('app', 'Obj'),
	    'obj_id' => Yii::t('app', 'Obj ID'),
	    'user_id' => Yii::t('app', 'User ID'),
	    'created' => Yii::t('app', 'Created'),
	];
    }

}
