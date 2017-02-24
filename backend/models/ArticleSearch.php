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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_article', 'article_category_id', 'status', 'views'], 'integer'],
            [['title', 'abridgment', 'content', 'header_title', 'header_image', 'header_image_small', 'create_time', 'update_time'], 'safe'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_article' => $this->id_article,
            'article_category_id' => $this->article_category_id,
            'status' => $this->status,
            'views' => $this->views,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'abridgment', $this->abridgment])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'header_title', $this->header_title])
            ->andFilterWhere(['like', 'header_image', $this->header_image])
            ->andFilterWhere(['like', 'header_image_small', $this->header_image_small]);

        return $dataProvider;
    }
}
