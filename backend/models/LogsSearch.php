<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Logs;

/**
 * Logs1Search represents the model behind the search form about `frontend\models\Logs1`.
 */
class LogsSearch extends Logs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', 'text', 'created'], 'safe'],
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
        $query = Logs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'type',
                'text',
                'created'=> [
                    'asc' => ['logs.created' => SORT_ASC],
                    'desc' => ['logs.created' => SORT_DESC],
                    'label' => 'Создано'
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        /* Правила фильтрации */

        // grid filtering conditions
        $query->andFilterWhere([
            'logs.id' => $this->id,
        ]);

        // Фильтр по категории
        $query->andWhere('logs.type LIKE "%'. $this->type . '%"');
        $query->andWhere('logs.text LIKE "%'. $this->text . '%"');
        $query->andWhere('logs.created LIKE "%'. $this->created . '%"');

        return $dataProvider;

    }
}
