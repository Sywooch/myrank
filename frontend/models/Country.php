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
	    'name' => Yii::t('app', 'Country Name'),
	];
    }

}
