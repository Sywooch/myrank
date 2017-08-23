<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company_struct".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $company_id
 * @property integer $sort
 * @property string $name
 * @property string $created
 */
class CompanyStruct extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'company_struct';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'company_id'], 'integer'],
            [['company_id', 'name'], 'required'],
            [['sort'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'name' => Yii::t('app', 'Name'),
            'sort' => Yii::t('app', 'Sort'),
            'created' => Yii::t('app', 'Created'),
        ];
    }
    
    public function getChildren () {
        return $this->hasMany(CompanyStruct::className(), ['parent_id' => 'id']);
    }
    
    public function getUserCompany () {
        return $this->hasMany(UserCompany::className(), ['struct_id' => 'id']);
    }
    
    public function getUsers () {
        return $this->hasMany(User::className(), ['id' => 'user_id'])
                ->via("userCompany");
    }
    
    public function getCountPersStruct () {
        $count = 0;
        foreach ($this->children as $item) {
            $count += $item->getUsers()->count();
        }
        return $count;
    }
    
    public function beforeDelete() {
        $this->deleteAll(['parent_id' => $this->id]);
        return parent::beforeDelete();
    }

}
