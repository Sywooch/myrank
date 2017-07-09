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

    static $lists = [];

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
            [['access', 'type', 'required'], 'safe'],
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
            'type' => Yii::t('app', 'MARKS_TYPE'),
        ];
    }

    public function getChild() {
        return $this->hasMany(Marks::className(), ['parent_id' => 'id']);
    }

    public static function getList($parent_id = 0, &$arr = [], $pref = "") {
        $mMarks = Marks::find()
                ->with('child')
                ->select(['id', 'name'])->where(['parent_id' => 0])
                ->where(['parent_id' => $parent_id])
                ->all();
        empty($arr) ? $arr[0] = (string) \Yii::t('app', 'WITHOUT_PARENT') : NULL;

        foreach ($mMarks as $item) {
            $arr[$item->id] = $pref . $item->name;
            //static::getList($item->id, $arr, $pref . " - ");
        }
        return $arr;
    }

}
