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
class Marks1 extends \yii\db\ActiveRecord
{

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
    public static function tableName()
    {
        return '{{%marks}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'access', 'type'], 'integer'],
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
            'name' => Yii::t('app', 'Name'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'access' => Yii::t('app', 'Access(Кому показывать)'),
            'type' => Yii::t('app', 'Type(Специализация)'),
            'parentName' => Yii::t('app', 'Parent Name')
        ];
    }

    public function getParent()
    {
        return $this->hasOne( self::className(),['id' => 'parent_id'])
            ->from(self::tableName() . ' AS parent');
    }

    public function getChildren() {
        return $this->hasOne(self::className(), ['parent_id' => 'id'])
            ->from(self::tableName().' AS parent');
    }

    public function getParentName() {
        //return $this->parent->name;
        //return @$this->parent->name;
        //return $this->parent['name'];
        $parent = $this->parent;
        return $parent ? $parent->name : 'Без родителя';
    }

}