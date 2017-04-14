<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property integer $id
 * @property string $text
 * @property integer $status
 * @property integer $who_from_to
 * @property integer $user_from
 * @property integer $user_to
 * @property integer $smile
 * @property integer $parent_id
 * @property string $created
 */
class Testimonials extends \yii\db\ActiveRecord {
    
    const SMILE_CLASS_POSITIVE = 2;
    const SMILE_CLASS_NEGATIVE = 1;
    const SMILE_CLASS_NEUTRAL = 0;
    
    const STATUS_NOACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_MODERATION = 2;
    
    public static $smiles = [
	self::SMILE_CLASS_POSITIVE => 'b-comments__item__smile_positive',
	self::SMILE_CLASS_NEGATIVE => 'b-comments__item__smile_negative',
	self::SMILE_CLASS_NEUTRAL => 'b-comments__item__smile_neutral',
    ];
    
    const WHO_FROM_TO_DIRECTOR = 1;
    const WHO_FROM_TO_CHIEF = 2;
    const WHO_FROM_TO_COLLEAGUE = 3;
    const WHO_FROM_TO_CLOSE_RELATIVE = 4;
    const WHO_FROM_TO_RELATIVE = 5;
    const WHO_FROM_TO_FRIEND = 6;
    const WHO_FROM_TO_FAMILIAR = 7;
    const WHO_FROM_TO_SLAVE = 8;
    
    public static $whoFromTo = [
	self::WHO_FROM_TO_DIRECTOR => 'Директор/Владелец компании',
	self::WHO_FROM_TO_CHIEF => 'Начальник',
	self::WHO_FROM_TO_COLLEAGUE => 'Коллега',
	self::WHO_FROM_TO_CLOSE_RELATIVE => 'Близкий родственник',
	self::WHO_FROM_TO_RELATIVE => 'Родственник',
	self::WHO_FROM_TO_FRIEND => 'Друг',
	self::WHO_FROM_TO_FAMILIAR => 'Знакомый',
	self::WHO_FROM_TO_SLAVE => 'Подчинённый'
    ];
    
    const COUNT_LIST = 10;

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'testimonials';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['user_from', 'user_to', 'smile', 'who_from_to', 'text'], 'required'],
	    [['text'], 'string'],
	    [['user_from', 'user_to', 'smile', 'parent_id'], 'integer'],
	    [['user_from', 'status'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'text' => Yii::t('app', 'Текст отзыва'),
	    'user_from' => Yii::t('app', 'User From'),
	    'user_to' => Yii::t('app', 'Usert To'),
	    'smile' => Yii::t('app', 'Smile'),
	    'parent_id' => Yii::t('app', 'Parent ID'),
	    'created' => Yii::t('app', 'Created'),
	];
    }
    
    public function getUserFrom () {
	return $this->hasOne(User::className(), ['id' => 'user_from']);
    }
    
    public function getUserTo () {
	return $this->hasOne(User::className(), ['id' => 'user_to']);
    }
    
    public function getAnswer () {
	return static::findOne(['parent_id' => $this->id]);
    }
    
    
    public function beforeSave($insert) {
	if(!isset($this->status)) {
	    $this->status = self::STATUS_ACTIVE;
	}
	return parent::beforeSave($insert);
    }

}
