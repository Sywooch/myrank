<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

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
 * @property integer $required
 */
class Marks extends \yii\db\ActiveRecord {
    
    public static $locales = [
	'ru_RU' => 'name',
	'en_US' => 'name_en',
	'ua_UA' => 'name_ua',
    ];
    
    public static $shortLoc = [
        'ru_RU' => 'short_name',
        'en_US' => 'short_name_en',
        'ua_UA' => 'short_name_ua',
    ];

    static $lists = [];
    
    public $profsField;

    const MARKS_ACCESS_ALL = 0;
    const MARKS_ACCESS_USER = 1;
    const MARKS_ACCESS_COMPANY = 2;
    const MARKS_ACCESS_FRONT_ALL = 1;
    const MARKS_ACCESS_FRONT_NONE = 2;

    public static function marksAccess() {
        return [
            self::MARKS_ACCESS_ALL => (string) \Yii::t('app', 'MARKS_ACCESS_ALL'),
            self::MARKS_ACCESS_USER => (string) \Yii::t('app', 'MARKS_ACCESS_USER'),
            self::MARKS_ACCESS_COMPANY => (string) \Yii::t('app', 'MARKS_ACCESS_COMPANY'),
        ];
    }

    public static function marksAccessFront() {
        return [
            self::MARKS_ACCESS_FRONT_ALL => (string) \Yii::t('app', 'MARKS_ACCESS_FRONT_ALL'),
            self::MARKS_ACCESS_FRONT_NONE => (string) \Yii::t('app', 'MARKS_ACCESS_FRONT_NONE'),
        ];
    }
    
    public static function find($default = false) {
        if($default) {
            return parent::find();
        } else {
            $lang = \Yii::$app->language;
            return parent::find()->select(["*" , self::$locales[$lang]. " AS name", self::$shortLoc[$lang] . " AS short_name"]);
        }
    }

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
            [['access', 'type', 'required', 'name_en', 
                'name_ua', 'configure', 'profsField', 
                'prof_only', 'parse', 'short_name', 'short_name_en', 'short_name_ua'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'MARKS_NAME'),
            'parent_id' => Yii::t('app', 'PARENT_ID'),
            'access' => Yii::t('app', 'MARKS_ACCESS'),
            'type' => 'Для кого',
            'name_en' => "EN",
            'name_ua' => "UA",
            'configure' => "Конфигурируемая",
            'required' => 'Обязательная',
            'prof_only' => 'Только для профессии',
            'short_name' => 'Короткое обозначение RU',
            'short_name_en' => 'Короткое обозначение EN',
            'short_name_ua' => 'Короткое обозначение UA'
        ];
    }

    public function getChild() {
        return $this->hasMany(Marks::className(), ['parent_id' => 'id']);
    }

    public static function getList($parent_id = 0, $type = 0, &$arr = [], $pref = "") {
        $mMarks = Marks::find()
                ->with('child')
                ->select(['id', 'name'])->where(['parent_id' => 0])
                ->where(['parent_id' => $parent_id,/* 'type' => $type */])
                ->all();
        empty($arr) ? $arr[0] = (string) \Yii::t('app', 'WITHOUT_PARENT') : NULL;

        foreach ($mMarks as $item) {
            $arr[$item->id] = $pref . $item->name;
            //static::getList($item->id, $arr, $pref . " - ");
        }
        return $arr;
    }
    
    public function beforeDelete() {
        static::deleteAll(['parent_id' => $this->id]);
        return parent::beforeDelete();
    }
    
    public function getProfessions () {
        return ArrayHelper::map(Profession::find()->asArray()->all(), 'id', 'title');
    }

}
