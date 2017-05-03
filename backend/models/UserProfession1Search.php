<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserProfession1;

/**
 * UserProfession1Search represents the model behind the search form about `frontend\models\UserProfession1`.
 */
class UserProfession1Search extends UserProfession1
{
    public $profession1Title;
    public $userFullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'profession_id'], 'integer'],
            [['profession1Title','userFullName'], 'safe']
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
        $query = UserProfession1::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

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
                'profession_id',
                'profession1Title' => [
                    'asc' => ['profession1.title' => SORT_ASC],
                    'desc' => ['profession1.title' => SORT_DESC],
                    'label' => ((string) \Yii::t('app','PROFESSION_TITLE') ),
                    'default' => SORT_ASC
                ],
                'name',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['profession1']);
            $query->joinWith(['user']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'user_profession.id' => $this->id,
            'user_profession.user_id' => $this->user_id,
            'user_profession.profession_id' => $this->profession_id,
        ]);

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFullName . '%"'
            );
        }]);

        $query->joinWith(['profession1' => function ($q) {
            $q->where('profession1.title LIKE "%' . $this->profession1Title . '%"'
            );
        }]);
        //$query->andWhere('profession1.title LIKE "%'. $this->profession1Title . '%"');

        return $dataProvider;
    }
}
