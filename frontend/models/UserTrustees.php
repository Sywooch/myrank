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
    const STATUS_REQUEST = 0;
    const STATUS_CONFIRM = 1;
    const STATUS_REFUSE = 2;
    const STATUS_REMOVE = 3;
    const COUNT_LIST_USER_PROFILE = 5;
    const COUNT_LIST_INFO = 8;

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
            [['to_id', 'from_id', 'type_from', 'type_to'], 'integer'],
            [['type_from', 'type_to', 'status'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'to_id' => Yii::t('app', 'USER_TO'),
            'from_id' => Yii::t('app', 'USER_FROM'),
            'created' => Yii::t('app', 'CREATED'),
        ];
    }

    public function getObjFrom() {
        return $this->type_from == UserConstant::TYPE_USER_COMPANY ? Company::className() : User::className();
    }

    public function getObjTo() {
        return $this->type_to == UserConstant::TYPE_USER_COMPANY ? Company::className() : User::className();
    }

    public function getUser() {
        return $this->hasOne($this->objTo, ['id' => 'to_id']);
    }

    public function getUserFrom() {
        return $this->hasOne($this->objFrom, ['id' => 'from_id']);
    }

    public function getObj() {
        return $this->from_id == Yii::$app->user->identity->objId ? $this->getUser() : $this->getUserFrom();
    }

}
