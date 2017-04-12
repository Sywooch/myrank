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
            'id_article_category' => Yii::t('app','ИД категории статьи'),
            'name' => Yii::t('app','Наименование категории статьи'),
            'locale' => Yii::t('app', 'Locale'),
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_category_id' => 'id_article_category']);
    }
}
