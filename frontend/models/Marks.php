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
 */
class Marks extends \yii\db\ActiveRecord {

    static $lists = [];

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
