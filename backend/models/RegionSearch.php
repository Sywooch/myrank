<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Region;

/**
 * Region1Search represents the model behind the search form about `frontend\models\Region1`.
 */
class RegionSearch extends Region
{
    public $countryName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'country_id', 'city_id'], 'integer'],
            ['name', 'safe'],
            ['countryName', 'safe']
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
        $query = Region::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'region_id',
                //'country_id',
                'city_id',
                'name',
                'countryName' => [
                    'asc' => ['country.name' => SORT_ASC],
                    'desc' => ['country.name' => SORT_DESC],
                    'label' => 'Страна'
                ],
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['country']);
            return $dataProvider;
        }

        /* Правила фильтрации */

        // grid filtering conditions
        $query->andFilterWhere([
            'region.region_id' => $this->region_id,            //'country_id' => $this->country_id,            //'region_id' => $this->region_id,
            'region.city_id' => $this->city_id,
        ]);

        // Фильтр по категории
        //$query->andWhere('city.city_id '. $this->city_id);

        $query->joinWith(['country' => function ($q) {
            $q->where('country.name LIKE "%' . $this->countryName . '%"');
        }]);

        $query->andWhere('region.name LIKE "%'. $this->name . '%"');

        return $dataProvider;
    }
}
