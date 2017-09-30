<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserTrustees;

/**
 * UserTrustees1Search represents the model behind the search form about `frontend\models\UserTrustees1`.
 */
class UserTrusteesSearch extends UserTrustees
{
    public $fullNameFrom;
    public $fullNameTo;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created','fullNameFrom', 'fullNameTo'], 'safe'],
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
        $query = UserTrustees::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        // Настройка параметров сортировки
        /*
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'user_from',
                'fullNameFrom' => [//'userFromFullName' => [
                    'asc' => ['userFrom.first_name' => SORT_ASC, 'userFrom.last_name' => SORT_ASC],
                    'desc' => ['userFrom.first_name' => SORT_DESC, 'userFrom.last_name' => SORT_DESC],
                    'label' => ((string) \Yii::t('app','USER_FROM_FULLNAME') ),
                    'default' => SORT_ASC
                ],
                'user_to',
                'fullNameTo' => [//'userToFullName' => [
                    'asc' => ['userTo.first_name' => SORT_ASC, 'userTo.last_name' => SORT_ASC],
                    'desc' => ['userTo.first_name' => SORT_DESC, 'userTo.last_name' => SORT_DESC],
                    'label' => ((string) \Yii::t('app','USER_TO_FULLNAME') ),
                    'default' => SORT_ASC
                ],
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
            'user_trustees.id' => $this->id,
            'user_trustees.user_to' => $this->user_to,
            'user_trustees.user_from' => $this->user_from,
        //    'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'user_trustees.created', $this->created]);

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
         * 
         */

        return $dataProvider;
    }
}
