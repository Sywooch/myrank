<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id_article
 * @property string $title
 * @property string $content
 * @property string $header_title
 * @property string $header_image
 * @property string $header_image_small
 * @property integer $article_category_id
 * @property integer $status
 * @property integer $views
 * @property string $create_time
 * @property string $update_time
 *
 * @property ArticleCategory $articleCategory
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'abridgment', 'header_title'], 'required'],
            [['content'], 'string'],
            [['article_category_id', 'status', 'views'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'abridgment', 'header_image', 'header_image_small'], 'string', 'max' => 255],
            [['header_title'], 'string', 'max' => 128],
            [['article_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::className(), 'targetAttribute' => ['article_category_id' => 'id_article_category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_article' => 'Id Article',
            'title' => 'Title',
            'abridgment' => 'Abridgment',
            'content' => 'Content',
            'header_title' => 'Header Title',
            'header_image' => 'Header Image',
            'header_image_small' => 'Header Image Small',
            'article_category_id' => 'Article Category ID',
            'status' => 'Status',
            'views' => 'Views',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategory()
    {
        return $this->hasOne(ArticleCategory::className(), ['id_article_category' => 'article_category_id']);
    }
}
