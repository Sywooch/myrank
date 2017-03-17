<?php

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
	    'city_id' => Yii::t('app', 'City ID'),
	    'country_id' => Yii::t('app', 'Country ID'),
	    'region_id' => Yii::t('app', 'Region ID'),
	    'name' => Yii::t('app', 'City Name'),
        'countryName' => Yii::t('app','Country Name'),
        'regionName' => Yii::t('app','Region Name'),
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
