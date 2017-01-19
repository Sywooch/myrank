<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_event".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $datetime
 */
class UserEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'datetime' => Yii::t('app', 'Datetime'),
        ];
    }
}
