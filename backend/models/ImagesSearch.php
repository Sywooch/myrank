<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Images;

/**
 * Images1Search represents the model behind the search form about `frontend\models\Images1`.
 */
class ImagesSearch extends Images
{
    public $userFullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            ['name', 'safe'],
            ['userFullName','safe']
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
        $query = Images::find();

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
                'name',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['user']);
            return $dataProvider;
        }

        /* Правила фильтрации */

        // grid filtering conditions
        $query->andFilterWhere([
            'images.id' => $this->id,
            'images.user_id' => $this->user_id,
        ]);

        // Фильтр по категории
        //$query->andWhere('city.city_id '. $this->city_id);

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFullName . '%"'
            );
        }]);

        $query->andWhere('images.name LIKE "%'. $this->name . '%"');
        //$query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;

    }
}
