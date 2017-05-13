<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id_article_category
 * @property string $name
 *
 * @property Article[] $articles
 */
class ArticleCategory extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{%article_category}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
            [['locale'], 'string', 'max' => 5],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_article_category' => Yii::t('app','ARTICLE_CATEGORY_ID'),
            'name' => Yii::t('app','ARTICLE_CATEGORY_NAME'),
            'locale' => Yii::t('app', 'LOCALE'),
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_category_id' => 'id_article_category']);
    }

    public static function getSubcategories($locale)
    {
        $subCategories = [];
        if ($locale) {
            $subCategories = self::find()
                ->select(['id_article_category','name'])
                ->where(['locale'=>$locale])
                ->asArray()
                ->all();
        }
        return $subCategories;
    }
}
