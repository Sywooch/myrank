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
            'country_id' => Yii::t('app', 'COUNTRY_ID'),
            'city_id' => Yii::t('app', 'CITY_ID'),
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

    static function getList() {
        $model = static::find()->orderBy("name")->all();
        foreach ($model as $item) {
            $out[$item->country_id] = $item->name;
        }
        return $out;
    }

}
