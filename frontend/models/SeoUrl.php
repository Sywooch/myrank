<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seo_url".
 *
 * @property integer $id
 * @property string $link
 * @property string $route
 * @property string $params
 * @property string $canonical 
 */
class SeoUrl extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'seo_url';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['route'], 'required'],
            [['route', 'params'], 'string', 'max' => 255],
            [['canonical', 'link'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'link' => Yii::t('app', 'Ссылка на фронте'),
            'route' => Yii::t('app', 'Внутреняя перелинковка'),
            'params' => Yii::t('app', 'Гет запросы'),
        ];
    }
    
    public function getSeoParamsRel () {
        return $this->hasMany(SeoUrlParamsRel::className(), ['seo_id' => 'id']);
    }
    
    public function getSeoParams () {
        return $this->hasMany(SeoUrlParams::className(), ['id' => 'param_id'])->via('seoParamsRel');
    }

}
