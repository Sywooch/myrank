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
            'id_article' => Yii::t('app','ARTICLE_ID'),
            'title' => Yii::t('app','TITLE'),
            'abridgment' => Yii::t('app','ABRIDGMENT'),
            'content' => Yii::t('app','CONTENT'),
            'header_title' => Yii::t('app','HEADER_TITLE'),
            'header_image' => Yii::t('app','HEADER_IMAGE'),
            'header_image_small' => Yii::t('app','HEADER_IMAGE_SMALL'),
            'header_image_small_square' => Yii::t('app','HEADER_IMAGE_SMALL_SQUARE'),
            'article_category_id' => Yii::t('app','ARTICLE_CATEGORY_ID'),
            'articleCategoryName' => Yii::t('app','ARTICLE_CATEGORY_NAME'),
            'status' => Yii::t('app','STATUS'),
            'locale' => Yii::t('app', 'LOCALE'),
            'views' => Yii::t('app','VIEWS'),
            'create_time' => Yii::t('app','CREATE_TIME'),
            'update_time' => Yii::t('app','UPDATE_TIME'),
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
            self::STATUS_DISABLE => \Yii::t('app','NO'),
            self::STATUS_ACTIVE => \Yii::t('app','YES'),
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
