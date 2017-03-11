<?php

//namespace app\models;
//namespace frontend\models;
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\City;

/**
 * ArticleSearch represents the model behind the search form about `app\models\Article`.
 */
class CitySearch extends City
{
    public $countryName;
    public $regionName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'country_id', 'region_id'], 'integer'],
            [['name'], 'safe'],
            [['countryName', 'regionName'], 'safe']
        ];
    }

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
        $query = City::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'city_id',   //'country_id', //'region_id',
                'name',
                'countryName' => [
                    'asc' => ['country.name' => SORT_ASC],
                    'desc' => ['country.name' => SORT_DESC],
                    'label' => 'Страна'
                ],
                'regionName' => [
                    'asc' => ['region.name' => SORT_ASC],
                    'desc' => ['region.name' => SORT_DESC],
                    'label' => 'Регион'
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['country']);
            $query->joinWith(['region']);
            return $dataProvider;
        }

        /* Правила фильтрации */

        // Фильтр по категории
        $query->joinWith(['country' => function ($q) {
            $q->where('country.name LIKE "%' . $this->countryName . '%"');
        }]);
        $query->joinWith(['region' => function ($q) {
            $q->where('region.name LIKE "%' . $this->regionName . '%"');
        }]);

        // grid filtering conditions
        $query->andFilterWhere([
            'city_id' => $this->city_id,            //'country_id' => $this->country_id,            //'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
