<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Marks;

/**
 * MarksSearch represents the model behind the search form about `frontend\models\Marks`.
 */
class MarksSearch extends Marks {

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['id', 'parent_id', 'type'], 'integer'],
	    [['name', 'access'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
	$query = Marks::find();

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
	    'id' => $this->id,
	    'parent_id' => $this->parent_id,
	    'access' => $this->access,
            'type' => $this->type
	]);

	$query->andFilterWhere(['like', 'name', $this->name]);
	$query->orderBy("parent_id ASC, id ASC");

	return $dataProvider;
    }

}
