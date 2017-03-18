<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ProfileViews;

/**
 * ProfileViews1Search represents the model behind the search form about `frontend\models\ProfileViews1`.
 */
class ProfileViewsSearch extends ProfileViews
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lastweek', 'lastmonth'], 'integer'],
            [['lastweek', 'lastmonth'],'safe']
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
        $query = ProfileViews::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'lastweek',
                'lastmonth',
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'profile_views.id' => $this->id,
            //'lastweek' => $this->lastweek,
            //'lastmonth' => $this->lastmonth,
        ]);

        $query->andFilterWhere(['like','profile_views.lastweek',$this->lastweek]);
        $query->andFilterWhere(['like','profile_views.lastmonth',$this->lastmonth]);

        return $dataProvider;
    }
}
