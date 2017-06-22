<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property string $type
 * @property string $text
 * @property string $created
 */
class Logs extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['text'], 'string'],
            [['created'], 'safe'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'LOGS_TYPE'),
            'text' => Yii::t('app', 'TEXT'),
            'created' => Yii::t('app', 'CREATED'),
        ];
    }

    public static function saveLog($text, $type = "app") {
        $model = new Logs();
        $model->type = $type;
        $model->text = $text;
        $model->save();
    }

}
