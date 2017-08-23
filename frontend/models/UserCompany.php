<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_company".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $admin
 * @property integer $company_id
 * @property integer $struct_id
 * @property integer $admin
 * @property string $company_post
 * @property string $company_name
 * @property integer $status
 * @property string $created
 */
class UserCompany extends \yii\db\ActiveRecord {
    
    const OBJ_TYPE_USER = User::TYPE_USER_USER;
    const OBJ_TYPE_COMPANY = User::TYPE_USER_COMPANY;
    
    const ACTION_BUT_CONFIRM = 1;
    const ACTION_BUT_REFUSE = 2;
    const ACTION_BUT_REMOVE = 3;
    
    const STATUS_CONFIRM = 1;
    const STATUS_REQUEST = 0;
    const STATUS_REFUSE = 2;
    const STATUS_REMOVE = 3;
    
    const USER_ADMIN = 1;
    const USER_NOADMIN = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_company';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'company_id', 'status'], 'integer'],
            [['company_post', 'company_name'], 'string', 'max' => 255],
            [['admin', 'struct_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'Айди юзверя',
            'company_id' => 'Айди компании',
            'company_post' => 'Должность в компании',
            'company_name' => 'Название компании',
            'status' => 'Статус (0 - заявка, 1 - подтвержден)',
            'created' => 'Created',
        ];
    }
    
    public function getUser () {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getCompany () {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
    
    public function getObj () {
        return $this->admin == self::OBJ_TYPE_COMPANY ? $this->getCompany() : $this->getUser();
    }

}
