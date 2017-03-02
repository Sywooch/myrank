<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "marks".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $access
 * @property integer $type
 */
class Marks extends \yii\db\ActiveRecord {

    static $lists = [];
    
    const MARKS_ACCESS_ALL = 0;
    const MARKS_ACCESS_USER = 1;
    const MARKS_ACCESS_COMPANY = 2;

    public static $marksAccess = [
	self::MARKS_ACCESS_ALL => 'Всем',
	self::MARKS_ACCESS_USER => 'Пользователю',
	self::MARKS_ACCESS_COMPANY => 'Пользователям',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'marks';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['parent_id'], 'integer'],
	    [['name'], 'string', 'max' => 255],
	    [['access', 'type'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'name' => Yii::t('app', 'Name'),
	    'parent_id' => Yii::t('app', 'Parent ID'),
	    'access' => Yii::t('app', 'Кому показывать'),
	    'type' => Yii::t('app', 'Специализация'),
	];
    }

    public static function getList() {
	if (empty(self::$lists)) {
	    $mMarks = Marks::find()
			    ->select(['id', 'name'])->where(['parent_id' => 0])
			    ->all();
	    self::$lists[0] = 'Без родителя';

	    foreach ($mMarks as $item) {
		self::$lists[$item->id] = $item->name;
	    }
	}
	return self::$lists;
    }

}
