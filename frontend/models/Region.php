<?php

namespace frontend\models;
//namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $region_id
 * @property integer $country_id
 * @property integer $city_id
 * @property string $name
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'city_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => Yii::t('app', 'REGION_ID'),
            'country_id' => Yii::t('app', 'COUNTRY_ID'),
            'city_id' => Yii::t('app', 'CITY_ID'),
            'name' => Yii::t('app', 'REGION_NAME'),
            'countryName' => Yii::t('app','COUNTRY_NAME')
        ];
    }

    public function getCountry() {
        return $this->hasOne(Country::classname(),['country_id'=>'country_id']);
    }

    public function getCountryName() {
        return $this->country->name;
    }
}
