<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Article;


class ArticleSearch extends Article
{
    public $articleCategoryName;

    public function rules()
    {
        return [
            [['id_article', 'status', 'views'], 'integer'],
            [['title', 'abridgment', 'content', 'header_title', 'header_image', 'header_image_small', 'header_image_small_square', 'locale', 'create_time', 'update_time'], 'safe'],
            ['articleCategoryName', 'safe']
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id_article',
                'title',
                'abridgment',
                'content',
                'locale',
                'header_title',
                //'header_image',
                //'header_image_small',
                //'header_image_small_square',
                'articleCategoryName' => [
                    'asc' => ['article_category.name' => SORT_ASC],
                    'desc' => ['article_category.name' => SORT_DESC],
                    'label' => 'Категория новостей'
                ],
                'status',
                'views',
                'create_time',
                'update_time'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            // Жадная загрузка данных модели ArticleCategory для работы сортировки.
            $query->joinWith(['articleCategory']);
            return $dataProvider;
        }

        // Правила фильтрации

        $query->andFilterWhere([
            'article.id_article' => $this->id_article,
            'article.status' => $this->status,
            'article.views' => $this->views,
            'article.create_time' => $this->create_time,
            'article.update_time' => $this->update_time,
        ]);

        $query->joinWith(['articleCategory' => function ($q) {
            $q->where('article_category.name LIKE "%' . $this->articleCategoryName . '%"');
        }]);

        $query->andWhere('article.title LIKE "%'. $this->title . '%"');
        $query->andWhere('article.abridgment LIKE "%'. $this->abridgment. '%"');
        $query->andWhere('article.content LIKE "%'. $this->content. '%"');
        $query->andWhere('article.locale LIKE "%'. $this->locale. '%"');
        $query->andWhere('article.header_title LIKE "%'. $this->header_title . '%"');
        //$query->andWhere('article.header_image LIKE "%'. $this->header_image . '%"');
        //$query->andWhere('article.header_image_small LIKE "%'. $this->header_image_small . '%"');
        //$query->andWhere('article.header_image_small_square LIKE "%'. $this->header_image_small_square . '%"');

        return $dataProvider;
    }
}
