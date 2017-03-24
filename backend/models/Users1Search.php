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

    public $cityName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', /*'account_id',*/ 'company_id', 'profileviews', 'type', 'rating', 'gender', 'city_id'], 'integer'],
            [['company_name', 'company_post', 'image', 'first_name', 'last_name', 'email', 'username', 'auth_key', 'password_hash',
                'password_reset_token', 'about', 'last_login', 'birthdate', 'phone', 'site', 'mark', 'marks_config'], 'safe'],
            [['cityName'], 'safe']
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

        $dataProvider->setSort([
            'attributes' => [
                'id',
                //'account_id',
                'company_id',
                'company_name',
                'company_post',
                'profileviews',
                'type',
                'image',
                'first_name',
                'last_name',
                'email',
                'username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'about',
                'last_login',
                'rating',
                'birthdate',
                'gender',
                //'city_id',
                'cityName' => [
                    'asc' => ['city.name' => SORT_ASC],
                    'desc' => ['city.name' => SORT_DESC],
                    'label' => 'Город'
                ],
                'phone',
                'site',
                'mark',
                'marks_config',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['city']);
            return $dataProvider;
        }
        /*
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
*/
        // grid filtering conditions
        $query->andFilterWhere([
            'user.id' => $this->id,
            //'user.account_id' => $this->account_id,
            'user.company_id' => $this->company_id,
            'user.profileviews' => $this->profileviews,
            'user.type' => $this->type,
            'user.last_login' => $this->last_login,
            'user.rating' => $this->rating,
            'user.birthdate' => $this->birthdate,
            'user.gender' => $this->gender,
            //'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'user.company_name', $this->company_name])
            ->andFilterWhere(['like', 'user.company_post', $this->company_post])
            ->andFilterWhere(['like', 'user.image', $this->image])
            ->andFilterWhere(['like', 'user.first_name', $this->first_name])
            ->andFilterWhere(['like', 'user.last_name', $this->last_name])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'user.username', $this->username])
            ->andFilterWhere(['like', 'user.auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'user.password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'user.password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'user.about', $this->about])
            ->andFilterWhere(['like', 'user.phone', $this->phone])
            ->andFilterWhere(['like', 'user.site', $this->site])
            ->andFilterWhere(['like', 'user.mark', $this->mark])
            ->andFilterWhere(['like', 'user.marks_config', $this->marks_config]);

        if(!empty($this->cityName))
            $query->joinWith(['city' => function ($q) {
                $q->where('city.name LIKE "%' . $this->cityName . '%"');
            }]);

        return $dataProvider;
    }
}
