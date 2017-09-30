<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "geo_country".
 *
 * @property integer $id
 * @property string $country_id
 * @property string $name
 * @property string $lang
 */
class GeoCountry extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'geo_country';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['country_id', 'lang', 'code'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => 'Имя страны',
            'code' => 'Код страны',
            'lang' => 'Язык',
        ];
    }

}
