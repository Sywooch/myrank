<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profession_marks".
 *
 * @property integer $id
 * @property integer $profession_id
 * @property integer $mark_id
 * @property string $created
 */
class ProfessionMarks extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'profession_marks';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['profession_id', 'mark_id'], 'required'],
            [['profession_id', 'mark_id'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'profession_id' => 'Profession ID',
            'mark_id' => 'Mark ID',
            'created' => 'Created',
        ];
    }

}
