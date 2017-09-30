<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_history".
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $from_type
 * @property integer $to_id
 * @property integer $to_type
 * @property integer $type
 * @property string $description
 * @property string $created
 */
class UserHistory extends \yii\db\ActiveRecord {
    
    const TYPE_HITS = 1;
    const TYPE_MARKS = 2;
    
    public $typeArr = [
        self::TYPE_HITS => 'Посещения',
        self::TYPE_MARKS => 'Оценки'
    ];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_history';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['from_id', 'from_type', 'to_id', 'to_type', 'type'], 'integer'],
            [['description'], 'string'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'from_id' => Yii::t('app', 'From ID'),
            'from_type' => Yii::t('app', 'From Type'),
            'to_id' => Yii::t('app', 'To ID'),
            'to_type' => Yii::t('app', 'To Type'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

}
