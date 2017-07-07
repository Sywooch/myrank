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
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'contr_act' => 'Контролер/Экшн',
            'rules' => "Правило",
        ];
    }

}
