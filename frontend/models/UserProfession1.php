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
            'id' => 'ID',
            'user_id' => 'User ID',
            'userFullName' => 'User FullName',
            'profession_id' => 'Profession ID',
            'profession1Title' => 'Profession Title'
        ];
    }

    public function getProfession1 () {
        return $this->hasOne(Profession1::className(), ['id' => 'profession_id'])->from(Profession1::tableName() . ' AS profession1');;
    }

    public function getProfession1Title() {
        return $this->profession1 ? ($this->profession1->title) : 'Нет профессии';
    }

    public function getUser () {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserFullName() {

        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : 'Нет пользователя';
    }
}
