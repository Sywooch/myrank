<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property integer $conut_persons
 * @property string $reg_date
 * @property integer $cash
 * @property string $director
 * @property string $contact_face
 * @property string $about
 */
class Company extends \yii\db\ActiveRecord {
    
    const COUNT_PERSONS_SMALL = 1;
    const COUNT_PERSONS_MEDIUM = 2;
    const COUNT_PERSONS_BIG = 3;
    
    const CASH_SMALL = 1;
    const CASH_MEDIUM = 2;
    const CASH_BIG = 3;
    
    public $countPersonsList = [
	self::COUNT_PERSONS_SMALL => "100 - 500",
	self::COUNT_PERSONS_MEDIUM => "100 - 1000",
	self::COUNT_PERSONS_BIG => "100 - 1500",
    ];
    
    public $cashList = [
	self::CASH_SMALL => "1 000 000 руб - 5 000 000 руб",
	self::CASH_MEDIUM => "1 000 000 руб - 10 000 000 руб",
	self::CASH_BIG => "1 000 000 руб - 15 000 000 руб",
    ];

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['name', 'reg_date'], 'required'],
	    [['count_persons', 'cash'], 'integer'],
	    [['reg_date'], 'safe'],
	    [['about'], 'string'],
	    [['phone', 'director', 'contact_face'], 'string', 'max' => 255],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'name' => Yii::t('app', 'Название компании'),
	    'phone' => Yii::t('app', 'Телефон компании'),
	    'count_persons' => Yii::t('app', 'Количество сотрудников'),
	    'reg_date' => Yii::t('app', 'Дата регистрации компании'),
	    'cash' => Yii::t('app', 'Ежегодный оборот компании'),
	    'director' => Yii::t('app', 'Фио директора'),
	    'contact_face' => Yii::t('app', 'Контактное лицо'),
	    'about' => Yii::t('app', 'Информация о компании'),
	];
    }

}
