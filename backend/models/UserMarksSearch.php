<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserMarks;

/**
 * UserMarks1Search represents the model behind the search form about `frontend\models\UserMarks1`.
 */
class UserMarksSearch extends UserMarks
{
    public $fullNameFrom;
    public $fullNameTo;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_to', 'user_from'], 'integer'],
            [['description', 'created', 'fullNameFrom', 'fullNameTo'], 'safe'],
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
        $query = UserMarks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'user_to',
                'fullNameTo' => [//'userToFullName' => [
                    'asc' => ['userTo.first_name' => SORT_ASC, 'userTo.last_name' => SORT_ASC],
                    'desc' => ['userTo.first_name' => SORT_DESC, 'userTo.last_name' => SORT_DESC],
                    'label' => 'UserTo Full Name',
                    'default' => SORT_ASC
                ],
                'user_from',
                'fullNameFrom' => [//'userFromFullName' => [
                    'asc' => ['userFrom.first_name' => SORT_ASC, 'userFrom.last_name' => SORT_ASC],
                    'desc' => ['userFrom.first_name' => SORT_DESC, 'userFrom.last_name' => SORT_DESC],
                    'label' => 'UserFrom Full Name',
                    'default' => SORT_ASC
                ],
                'description',
                'created'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['userFrom']);
            $query->joinWith(['userTo']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_marks.id' => $this->id,
            'user_marks.user_to' => $this->user_to,
            'user_marks.user_from' => $this->user_from,
        ]);

        $query->andFilterWhere(['like', 'user_marks.description', $this->description]);
        $query->andFilterWhere(['like', 'user_marks.created', $this->created]);

        $query->joinWith(['userFrom' => function ($q) {
            $q->where('userFrom.first_name LIKE "%' . $this->fullNameFrom . '%"'
                .' OR userFrom.last_name LIKE "%' . $this->fullNameFrom . '%"'
            );
        }]);

        $query->joinWith(['userTo' => function ($q) {
            $q->where('userTo.first_name LIKE "%' . $this->fullNameTo . '%"'
                .' OR userTo.last_name LIKE "%' . $this->fullNameTo . '%"'
            );
        }]);

        return $dataProvider;
    }
}
