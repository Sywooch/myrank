<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AccessCategoryView;

/**
 * AccessCategoryView1Search represents the model behind the search form about `frontend\models\AccessCategoryView1`.
 */
class AccessCategoryViewSearch extends AccessCategoryView
{
    //public $categoryName;
    public $userFullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'category_id', 'value'], 'integer'],
            [[/*'categoryName',*/'userFullName'],'safe'],
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
        $query = AccessCategoryView::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'user_id',
                'category_id',
                'value',
                /*'categoryName' => [
                    'asc' => ['category.name' => SORT_ASC],
                    'desc' => ['category.name' => SORT_DESC],
                    'label' => 'Название категории'
                ],*/
                'userFullName' => [
                    'asc' => ['user.first_name' => SORT_ASC, 'user.last_name' => SORT_ASC],
                    'desc' => ['user.first_name' => SORT_DESC, 'user.last_name' => SORT_DESC],
                    'label' => 'User Full Name',
                    'default' => SORT_ASC
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            //$query->joinWith(['category']);
            $query->joinWith(['user']);
            return $dataProvider;
        }

        /* Правила фильтрации */

        // grid filtering conditions
        $query->andFilterWhere([
            'access_category_view.id' => $this->id,
            'access_category_view.user_id' => $this->user_id,
            'access_category_view.category_id' => $this->category_id,
        ]);

        // Фильтр по категории
        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFullName . '%"'
            );
        }]);

        /*$query->joinWith(['category' => function ($q) {
            $q->where('category.name LIKE "%' . $this->categoryName . '%"');
        }]);*/

        $query->andWhere('access_category_view.value LIKE "%'. $this->value . '%"');

        return $dataProvider;
    }
}
