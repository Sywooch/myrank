<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Profession1;

/**
 * Profession1Search represents the model behind the search form about `frontend\models\Profession1`.
 */
class Profession1Search extends Profession1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title'], 'safe'],
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
        $query = Profession1::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'profession.id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'profession.title', $this->title]);

        return $dataProvider;
    }
}
