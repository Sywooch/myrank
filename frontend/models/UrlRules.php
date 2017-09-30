<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use Yii;

class UrlRules extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'url_rules';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['contr_act', 'rules'], 'required'],
            [['meta_tag_rules', 'meta_descr_rules'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'contr_act' => 'Контролер/Экшн',
            'rules' => "Правило",
            'meta_tag_rules' => 'Правило мета-тегов',
            'meta_descr_rules' => 'Правило мета-описания'
        ];
    }
    
    public function afterSave($insert, $changedAttributes) {
        SeoUrl::deleteAll();
        return parent::afterSave($insert, $changedAttributes);
    }

}
