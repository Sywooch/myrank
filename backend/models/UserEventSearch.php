<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserEvent;

/**
 * UserEvent1Search represents the model behind the search form about `frontend\models\UserEvent1`.
 */
class UserEventSearch extends UserEvent
{
    public $userFullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['name', 'datetime','userFullName'], 'safe'],
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
        $query = UserEvent::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'user_id',
                'name',
                'userFullName' => [
                    'asc' => ['user.first_name' => SORT_ASC, 'user.last_name' => SORT_ASC],
                    'desc' => ['user.first_name' => SORT_DESC, 'user.last_name' => SORT_DESC],
                    'label' => 'User Full Name',
                    'default' => SORT_ASC
                ],
                'datetime',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['user']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_event.id' => $this->id,
            'user_event.user_id' => $this->user_id,
            'user_event.datetime' => $this->datetime,
        ]);

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFullName . '%"'
            );
        }]);

        $query->andFilterWhere(['like', 'user_event.name', $this->name]);

        return $dataProvider;
    }
}
