<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * User1Search represents the model behind the search form about `frontend\models\User1`.
 */
class Users1Search extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'company_id', 'profileviews', 'type', 'rating', 'gender', 'city_id'], 'integer'],
            [['company_name', 'company_post', 'image', 'first_name', 'last_name', 'email', 'username', 'auth_key', 'password_hash', 'password_reset_token', 'about', 'last_login', 'birthdate', 'phone', 'site', 'mark', 'marks_config'], 'safe'],
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
            'account_id' => $this->account_id,
            'company_id' => $this->company_id,
            'profileviews' => $this->profileviews,
            'type' => $this->type,
            'last_login' => $this->last_login,
            'rating' => $this->rating,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_post', $this->company_post])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'mark', $this->mark])
            ->andFilterWhere(['like', 'marks_config', $this->marks_config]);

        return $dataProvider;
    }
}
