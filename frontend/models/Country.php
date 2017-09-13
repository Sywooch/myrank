<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $country_id
 * @property string $name
 */
class Country extends \yii\db\ActiveRecord {
    
    public $geoCountries;
    public $countryCode;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'string', 'max' => 128],
            [['countryCode', 'geoCountries'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'country_id' => Yii::t('app', 'COUNTRY_ID'),
            //'city_id' => Yii::t('app', 'CITY_ID'),
            'name' => Yii::t('app', 'COUNTRY_NAME'),
        ];
    }

    public function getCity() {
        return $this->hasMany(City::className(), ['country_id' => 'country_id']);
    }

    public function getCityArr() {
        $out[""] = \Yii::t('app', 'ALL');
        foreach ($this->getCity()->orderBy('name ASC')->asArray()->all() as $item) {
            $out[$item['city_id']] = $item['name'];
        }
        return $out;
    }

    static function getList($lang = NULL) {
        //$lang = Yii::$app->params['lang'];
        $model = static::find()->orderBy("name")->all();
        
        if(isset($lang)) {
            $mGeoC = GeoCountry::findAll(['lang' => $lang]);
            foreach ($mGeoC as $item) {
                $mGeoName[$item->country_id] = $item->name;
            }
        }
        
        foreach ($model as $item) {
            $out[$item->country_id] = isset($mGeoName[$item->country_id]) ? $mGeoName[$item->country_id] : $item->name;
        }
        return $out;
    }
    
    public function getGeoCountries () {
        return $this->hasMany(GeoCountry::className(), ['contry_id' => 'id']);
    }
    
    public function afterSave($insert, $changedAttributes) {
            GeoCountry::deleteAll(['country_id' => $this->country_id]);
            foreach ($this->geoCountries as $key => $item) {
                $mGeoCountry = new GeoCountry();
                $mGeoCountry->country_id = $this->country_id;
                $mGeoCountry->name = $item['name'];
                $mGeoCountry->code = $this->countryCode;
                $mGeoCountry->lang = $key;
                $mGeoCountry->save();
            }
        return parent::afterSave($insert, $changedAttributes);
    }

}
