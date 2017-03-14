<?php

//namespace app\models;
//namespace frontend\models;
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Article;

/**
 * ArticleSearch represents the model behind the search form about `app\models\Article`.
 */
class ArticleSearch extends Article
{
    public $articleCategoryName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_article'/*'article_category_id'*/, 'status', 'views'], 'integer'],
            [['title', 'abridgment', 'content', 'header_title', 'header_image', 'header_image_small', 'header_image_small_square', 'create_time', 'update_time'], 'safe'],
            ['articleCategoryName', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**
         * Настройка параметров сортировки
         * Важно: должна быть выполнена раньше $this->load($params)
         */
        $dataProvider->setSort([
            'attributes' => [
                'id_article',
                'title',
                'abridgment',
                'content',
                'header_title',
                'header_image',
                'header_image_small',
                'header_image_small_square',
                //'article_category_id' => 'Article Category ID',
                'articleCategoryName' => [
                    'asc' => ['article_category.name' => SORT_ASC],
                    'desc' => ['article_category.name' => SORT_DESC],
                    'label' => 'Категория новостей'
                    //, 'default' => SORT_ASC
                ],
                'status',
                'views',
                'create_time',
                'update_time'
            ]
        ]);

        //$this->load($params);
        //if (!$this->validate()) {

        if (!($this->load($params) && $this->validate())) {
            // Жадная загрузка данных модели ArticleCategory для работы сортировки.
            $query->joinWith(['articleCategory']);

            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        /* Правила фильтрации */

        // Фильтр по категории

        // grid filtering conditions
        $query->andFilterWhere([
            'article.id_article' => $this->id_article,
            //'article_category_id' => $this->article_category_id,
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
        $query->andWhere('article.header_title LIKE "%'. $this->header_title . '%"');
        $query->andWhere('article.header_image LIKE "%'. $this->header_image . '%"');
        $query->andWhere('article.header_image_small LIKE "%'. $this->header_image_small . '%"');
        $query->andWhere('article.header_image_small_square LIKE "%'. $this->header_image_small_square . '%"');

        return $dataProvider;
    }

}
