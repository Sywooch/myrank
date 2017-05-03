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
class UserProfession1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profession';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'profession_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app','ID'),
            'user_id' => \Yii::t('app','USER_ID'),
            'userFullName' => \Yii::t('app','USER_FULL_NAME'),
            'profession_id' => \Yii::t('app','PROFESSION_ID'),
            'profession1Title' => \Yii::t('app','PROFESSION_TITLE')
        ];
    }

    public function getProfession1 () {
        return $this->hasOne(Profession1::className(), ['id' => 'profession_id'])->from(Profession1::tableName() . ' AS profession1');;
    }

    public function getProfession1Title() {
        return $this->profession1 ? ($this->profession1->title) : ((string) \Yii::t('app','PROFESSION_NO') );
    }

    public function getUser () {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserFullName() {

        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : ((string) \Yii::t('app','NO_USER') );
    }
}
