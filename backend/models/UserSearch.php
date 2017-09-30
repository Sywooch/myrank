<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * UserSearch represents the model behind the search form about `frontend\models\User`.
 */
class UserSearch extends User {
    
    public $username;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'profileviews', 'type', 'rating', 'gender', 'city_id'], 'integer'],
            [['image', 'first_name', 'last_name', 'about',
            'last_login', 'birthdate', 'phone', 'site', 'mark', 'email', 'username'], 'safe'],
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
        $query = User::find();

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
            'profileviews' => $this->profileviews,
            'type' => $this->type,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'first_name', $this->first_name])
                ->andFilterWhere(['like', 'last_name', $this->last_name])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'site', $this->site])
                ->andFilterWhere(['like', 'mark', $this->mark]);
        
        isset($this->username) && ($this->username != "") ? $query->andOnCondition("last_name = :name OR first_name = :name", [':name' => $this->username]) : NULL;

        return $dataProvider;
    }

}
