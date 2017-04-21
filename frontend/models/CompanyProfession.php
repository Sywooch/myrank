<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company_profession".
 *
 * @property integer $id
 * @property integer $company_id
 * @property integer $profession_id
 */
class CompanyProfession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_profession';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'profession_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'profession_id' => Yii::t('app', 'Profession ID'),
        ];
    }
}
