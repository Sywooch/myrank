<?php

namespace frontend\models;

use Yii;

class Article extends \yii\db\ActiveRecord
{
    const STATUS_DISABLE = 0;
    const STATUS_ACTIVE = 10;

    public static function tableName()
    {
        return '{{%article}}';
    }

    public function rules()
    {
        return [
            [['title', 'abridgment', 'header_title'], 'required'],
            [['content'], 'string'],
            [['article_category_id', 'status', 'views'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'abridgment', 'header_image', 'header_image_small', 'header_image_small_square'], 'string', 'max' => 255],
            [['header_title'], 'string', 'max' => 128],
            [['locale'], 'string', 'max' => 5],
            [['article_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category_id' => 'id_article_category']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_article' => Yii::t('app','ИД'),
            'title' => Yii::t('app','Заглавие'),
            'abridgment' => Yii::t('app','Сокращенный текст'),
            'content' => Yii::t('app','Содержание'),
            'header_title' => Yii::t('app','Заголовок заглавия'),
            'header_image' => Yii::t('app','Заголовок изображение'),
            'header_image_small' => Yii::t('app','Заголовок среднее изображение'),
            'header_image_small_square' => Yii::t('app','Заголовок уменьшенное изображение'),
            'article_category_id' => Yii::t('app','ИД категории статьи'),
            'articleCategoryName' => Yii::t('app','Наименование категории статьи'),
            'status' => Yii::t('app','Статус'),
            'locale' => Yii::t('app', 'Locale'),
            'views' => Yii::t('app','Просмотры'),
            'create_time' => Yii::t('app','Дата создания'),
            'update_time' => Yii::t('app','Дата обновления'),
        ];
    }

    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id_article_category' => 'article_category_id']);
    }

    public function getArticleCategoryName()
    {
        return $this->articleCategory->name;
    }

    static public function statusDropDownList()
    {
        $formatter = Yii::$app->formatter;
        return [
            self::STATUS_DISABLE => $formatter->asBoolean(self::STATUS_DISABLE),
            self::STATUS_ACTIVE => $formatter->asBoolean(self::STATUS_ACTIVE)
        ];
    }

    public static function getItemAlias($type, $key = null, $exclude = null)
    {
        $items = [];

        $items['status'] = [
            self::STATUS_DISABLE => 'Нет',
            self::STATUS_ACTIVE => 'Да',
        ];

        if ($exclude !== null) {
            if (is_array($exclude)) {
                foreach ($exclude as $excluded) {
                    unset($items[$type][$excluded]);
                }
            } else {
                unset($items[$type][$exclude]);
            }
        }

        return $key === null ? $items[$type] : $items[$type][$key];
    }
}
