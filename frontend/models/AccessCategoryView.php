<?php

namespace app\models;

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
            'user_id' => Yii::t('app', 'User ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
}
