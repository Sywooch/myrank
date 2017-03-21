<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserClaim;

/**
 * UserClaim1Search represents the model behind the search form about `frontend\models\UserClaim1`.
 */
class UserClaimSearch extends UserClaim
{
    public $userFullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'obj_id', 'user_id'], 'integer'],
            [['obj', 'created', 'userFullName'], 'safe'],
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
        $query = UserClaim::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'obj',
                'obj_id',
                'user_id',
                'userFullName' => [
                    'asc' => ['user.first_name' => SORT_ASC, 'user.last_name' => SORT_ASC],
                    'desc' => ['user.first_name' => SORT_DESC, 'user.last_name' => SORT_DESC],
                    'label' => 'User Full Name',
                    'default' => SORT_ASC
                ],
                'created',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['user']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_claim.id' => $this->id,
            'user_claim.obj_id' => $this->obj_id,
            'user_claim.user_id' => $this->user_id,
            'user_claim.created' => $this->created,
        ]);

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFullName . '%"'
            );
        }]);

        $query->andFilterWhere(['user_claim.like', 'obj', $this->obj]);

        return $dataProvider;
    }
}
