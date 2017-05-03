<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Auth;
use frontend\models\User;

/**
 * Auth1Search represents the model behind the search form about `frontend\models\Auth1`.
 */
class AuthSearch extends Auth
{
    public $userFullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['source', 'source_id', 'userFullName'], 'safe'],
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
        $query = Auth::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
/*
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'source_id', $this->source_id]);
*/
// Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'user_id',
                'userFullName' => [
                    'asc' => ['user.first_name' => SORT_ASC, 'user.last_name' => SORT_ASC],
                    'desc' => ['user.first_name' => SORT_DESC, 'user.last_name' => SORT_DESC],
                    'label' => ((string) \Yii::t('app','USER_FULL_NAME') ),
                    'default' => SORT_ASC
                ],
                'source',
                'source_id'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['user']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'auth.id' => $this->id,
            'auth.user_id' => $this->user_id,
            'auth.source' => $this->source,
            'auth.source_id' => $this->source_id,
        ]);

        //$query->andFilterWhere(['like', 'auth.userFullName',$this->userFullName]);

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFullName . '%"'
            );
        }]);

        return $dataProvider;
    }
}
