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
	    [['to_id', 'from_id'], 'required'],
	    [['to_id', 'from_id', 'type'], 'integer'],
            [['type_from', 'type_to'], 'safe']
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'user_to' => Yii::t('app', 'USER_TO'),
	    'user_from' => Yii::t('app', 'USER_FROM'),
	    'created' => Yii::t('app', 'CREATED'),
	];
    }
    
    public function getUser () {
	return $this->hasOne(User::className(), ['id' => 'to_id'])
                ->andWhere(['type_to' => User::TYPE_USER_USER]);
    }

}
