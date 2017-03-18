<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Marks1;

/**
 * Marks1Search represents the model behind the search form about `frontend\models\Marks1`.
 */
class Marks1Search extends Marks1
{
    public $parentName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['parent_id', 'access', 'type'], 'safe'],
            [['name','parentName'], 'safe'],
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
        $query = Marks1::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'name' => [
                    'asc' => ['marks.name'=>SORT_ASC],
                    'desc' => ['marks.name'=> SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
                'parent_id',
                'access',
                'type',
                'parentName' => [
                    'asc' => ['parent.name' => SORT_ASC],
                    'desc' => ['parent.name' => SORT_DESC],
                    'label' => 'Parent Name',
                    'default' => SORT_ASC
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['parent']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'marks.id' => $this->id,
        ]);

        //$query->andFilterWhere(['like','marks.name',$this->name]);
        $query->andFilterWhere(['like','marks.parent_id',$this->parent_id]);
        $query->andFilterWhere(['like','marks.access',$this->access]);
        $query->andFilterWhere(['like','marks.type',$this->type]);

        $query->andWhere('marks.name LIKE "%'. $this->name . '%"');
        //$query->andFilterWhere(['like', 'marks.name', $this->name]);

        if(!empty($this->parentName)) {
            $query->joinWith(['parent'=> function($q) {
                $q->where('parent.name LIKE "%' . $this->parentName . '%" ');
                //$q->where('parent.name IS NULL');
        }]);
        }

        return $dataProvider;
    }

}
