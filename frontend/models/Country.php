<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $country_id
 * @property integer $city_id
 * @property string $name
 */
class Country extends \yii\db\ActiveRecord {

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
	    [['city_id'], 'integer'],
	    [['name'], 'string', 'max' => 128],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'country_id' => Yii::t('app', 'Country ID'),
	    'city_id' => Yii::t('app', 'City ID'),
	    'name' => Yii::t('app', 'Name'),
	];
    }
    
    public function getCity () {
	return $this->hasMany(City::className(), ['country_id' => 'country_id']);
    }
    
    public function getCityArr () {
	$out[""] = "Все";
	foreach ($this->getCity()->orderBy('name ASC')->asArray()->all() as $item) {
	    $out[$item['city_id']] = $item['name'];
	}
	return $out;
    }
    
    static function getList () {
	$model = static::find()->all();
	foreach ($model as $item) {
	    $out[$item->country_id] = $item->name;
	}
	return $out;
    }

}
