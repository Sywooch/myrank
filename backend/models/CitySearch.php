<?php

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
    //public $city_id;
    public $countryName;
    public $regionName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //['city_id',/* 'country_id', 'region_id',*/ 'integer'],
            ['city_id','safe'],
            ['name', 'safe'],
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
                'name',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['country']);
            $query->joinWith(['region']);
            return $dataProvider;
        }

        /* Правила фильтрации */

        // grid filtering conditions
        $query->andFilterWhere([
            'city.city_id' => $this->city_id,            //'country_id' => $this->country_id,            //'region_id' => $this->region_id,
        ]);



        // Фильтр по категории
        //$query->andWhere('city.city_id '. $this->city_id);

        $query->joinWith(['country' => function ($q) {
            $q->where('country.name LIKE "%' . $this->countryName . '%"');
        }]);
        $query->joinWith(['region' => function ($q) {
            $q->where('region.name LIKE "%' . $this->regionName . '%"');
        }]);
        $query->andWhere('city.name LIKE "%'. $this->name . '%"');
        //$query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
