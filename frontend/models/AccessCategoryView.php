<?php

namespace frontend\models;//namespace app\models;

use Yii;

/**
 * This is the model class for table "access_category_view".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $value
 */
class AccessCategoryView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_category_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'value'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'USER_ID'),
            'category_id' => Yii::t('app', 'CATEGORY_ID'),
            'value' => Yii::t('app', 'VALUE'),
            'userFullName' => Yii::t('app', 'USER_FULL_NAME'),
            //'categoryName' => Yii::t('app', 'CATEGORY_NAME'),
        ];
    }

    /*public function getCategory() {
        return $this->hasOne(Category::className(),['category_id' => 'category_id']);
    }

    public function getCategoryName() {
        return $this->category->name;
    }*/

    public function getUser() {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }

    public function getUserFullName() {
        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : \Yii::t('app','NO_USER');
    }
}
