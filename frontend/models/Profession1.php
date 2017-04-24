<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profession".
 *
 * @property integer $id
 * @property string $title
 */
class Profession1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profession';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'PROFESSION_ID'),
            'title' => Yii::t('app', 'PROFESSION_TITLE'),
        ];
    }
}
