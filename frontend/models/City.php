<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property integer $country_id
 * @property integer $region_id
 * @property string $name
 */
class City extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['country_id', 'region_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'city_id' => Yii::t('app', 'CITY_ID'),
            'country_id' => Yii::t('app', 'COUNTRY_ID'),
            'region_id' => Yii::t('app', 'REGION_ID'),
            'name' => Yii::t('app', 'CITY_NAME'),
            'countryName' => Yii::t('app', 'COUNTRY_NAME'),
            'regionName' => Yii::t('app', 'REGION_NAME'),
        ];
    }

    public function getCountry() {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    public function getCountryName() {
        return $this->country->name;
    }

    public function getRegion() {
        return $this->hasOne(Region::className(), ['region_id' => 'region_id']);
    }

    public function getRegionName() {
        return $this->region->name;
    }

}
