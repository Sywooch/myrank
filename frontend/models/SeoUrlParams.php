<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seo_url_params".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 */
class SeoUrlParams extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'seo_url_params';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'value'], 'required'],
            [['name', 'value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

}
