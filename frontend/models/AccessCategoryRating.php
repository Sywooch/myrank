<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "access_category_rating".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $value
 */
class AccessCategoryRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_category_rating';
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
            'user_id' => Yii::t('app', 'User ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'value' => Yii::t('app', 'Value'),
            'userFullName' => Yii::t('app', 'User Full Name'),
            //'categoryName' => Yii::t('app', 'Category Name'),
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
        return $this->user ? ($this->user->first_name.' '.$this->user->last_name) : 'Нет пользователя';
    }
}
