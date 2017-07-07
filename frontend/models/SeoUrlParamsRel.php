<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seo_url_params_rel".
 *
 * @property integer $id
 * @property integer $seo_id
 * @property integer $param_id
 */
class SeoUrlParamsRel extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'seo_url_params_rel';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['seo_id', 'param_id'], 'required'],
            [['seo_id', 'param_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'seo_id' => Yii::t('app', 'Идентификатор записи в таблице `seo_url`'),
            'param_id' => Yii::t('app', 'Идентификатор записи в таблице `seo_url_params`'),
        ];
    }
    
    public function getSeoUrl () {
        return $this->hasOne(SeoUrl::className(), ['id' => 'seo_id']);
    }
    
    public function getSeoParam () {
        return $this->hasOne(SeoUrlParams::className(), ['id' => 'param_id']);
    }

}
