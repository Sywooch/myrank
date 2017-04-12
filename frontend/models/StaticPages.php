<?php

namespace frontend\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "static_pages".
 *
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property integer $published
 * @property string $content
 * @property string $title_browser
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $create_time
 * @property string $update_time
 */
class StaticPages extends \yii\db\ActiveRecord
{
    const PUBLISHED_NO = 0;
    const PUBLISHED_YES = 1;

    /*public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'alias',
                'immutable' => true,
            ],
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_time'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }*/

    public static function tableName()
    {
        return 'static_pages';
    }

    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['published'], 'integer'],
            [['content'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'alias', 'title_browser'], 'string', 'max' => 128],
            [['locale'], 'string', 'max' => 5],
            [['meta_keywords'], 'string', 'max' => 200],
            [['meta_description'], 'string', 'max' => 160],
            //[['alias'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ИД'),
            'title' => Yii::t('app', 'Заглавие'),
            'alias' => Yii::t('app', 'Псевдоним'),
            'published' => Yii::t('app', 'Опубликовано'),
            'content' => Yii::t('app', 'Содержание'),
            'locale' => Yii::t('app', 'Locale'),
            'title_browser' => Yii::t('app', 'Заглавие браузера'),
            'meta_keywords' => Yii::t('app', 'Мета-ключевые слова'),
            'meta_description' => Yii::t('app', 'Метаописание'),
            'create_time' => Yii::t('app', 'Дата создания'),
            'update_time' => Yii::t('app', 'Дата обновления'),
        ];
    }

    static public function publishedDropDownList()
    {
        $formatter = Yii::$app->formatter;
        return [
            self::PUBLISHED_NO => $formatter->asBoolean(self::PUBLISHED_NO),
            self::PUBLISHED_YES => $formatter->asBoolean(self::PUBLISHED_YES),
        ];
    }
}
