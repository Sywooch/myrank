<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserMarkRating;

/**
 * UserMarkRating1Search represents the model behind the search form about `frontend\models\UserMarkRating1`.
 */
class UserMarkRatingSearch extends UserMarkRating
{
    public $fullNameFrom;
    public $fullNameTo;
    public $marks1Name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_from', 'user_to', 'mark_id'], 'integer'],
            [['mark_val'], 'number'],
            [['fullNameFrom', 'fullNameTo', 'marks1Name'],'safe']
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
        $query = UserMarkRating::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'user_from',
                'fullNameFrom' => [//'userFromFullName' => [
                    'asc' => ['userFrom.first_name' => SORT_ASC, 'userFrom.last_name' => SORT_ASC],
                    'desc' => ['userFrom.first_name' => SORT_DESC, 'userFrom.last_name' => SORT_DESC],
                    'label' => 'UserFrom Full Name',
                    'default' => SORT_ASC
                ],
                'user_to',
                'fullNameTo' => [//'userToFullName' => [
                    'asc' => ['userTo.first_name' => SORT_ASC, 'userTo.last_name' => SORT_ASC],
                    'desc' => ['userTo.first_name' => SORT_DESC, 'userTo.last_name' => SORT_DESC],
                    'label' => 'UserTo Full Name',
                    'default' => SORT_ASC
                ],
                'mark_id',
                'marks1Name' => [
                    'asc' => ['marks1.name' => SORT_ASC],
                    'desc' => ['marks1.name' => SORT_DESC],
                    'label' => 'Profession Title',
                    'default' => SORT_ASC
                ],
                'mark_val'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['userFrom']);
            $query->joinWith(['userTo']);
            $query->joinWith(['marks1']);
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'user_mark_rating.id' => $this->id,
            'user_mark_rating.user_from' => $this->user_from,
            'user_mark_rating.user_to' => $this->user_to,
            'user_mark_rating.mark_id' => $this->mark_id,
            'user_mark_rating.mark_val' => $this->mark_val,
        ]);

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

        $query->joinWith(['marks1' => function ($q) {
            $q->where('marks1.name LIKE "%' . $this->marks1Name . '%"'
            );
        }]);

        return $dataProvider;
    }
}
