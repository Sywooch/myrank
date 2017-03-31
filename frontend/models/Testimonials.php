<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $status
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
	    [['user_from', 'user_to', 'smile'], 'required'],
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
	    'text' => Yii::t('app', 'Text'),
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
