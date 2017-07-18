<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_marks_custom".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_type
 * @property integer $parent_id
 * @property integer $mark_id
 * @property string $created
 */
class UserMarksCustom extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_marks_custom';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'user_type', 'mark_id'], 'required'],
            [['user_id', 'user_type', 'parent_id', 'mark_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_type' => 'User Type',
            'parent_id' => 'Parent ID',
            'mark_id' => 'Mark ID',
            'created' => 'Created',
        ];
    }

}
