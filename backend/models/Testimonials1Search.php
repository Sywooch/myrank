<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Testimonials1;
use frontend\models\User;

/**
 * Testimonials1Search represents the model behind the search form about `frontend\models\Testimonials1`.
 */
class Testimonials1Search extends Testimonials1
{
    public $parentText;
    public $userFromFullName;
    public $userToFullName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_from', 'user_to', 'smile'], 'integer'],
            [['parent_id', 'parentText', 'text', 'created', 'userFromFullName', 'userToFullName'], 'safe'],

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
        $query = Testimonials1::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Настройка параметров сортировки
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'text' => [
                    'asc' => ['testimonials.text'=>SORT_ASC],
                    'desc' => ['testimonials.text'=> SORT_DESC],
                    'label' => 'Testimonials Text',
                    'default' => SORT_ASC
                ],
                'user_from',
                'userFromFullName' => [
                    'asc' => ['user.first_name' => SORT_ASC, 'user.last_name' => SORT_ASC],
                    'desc' => ['user.first_name' => SORT_DESC, 'user.last_name' => SORT_DESC],
                    'label' => 'UserFrom Full Name',
                    'default' => SORT_ASC
                ],
                'user_to',
                'userToFullName' => [
                    'asc' => ['user.first_name' => SORT_ASC, 'user.last_name' => SORT_ASC],
                    'desc' => ['user.first_name' => SORT_DESC, 'user.last_name' => SORT_DESC],
                    'label' => 'UserTo Full Name',
                    'default' => SORT_ASC
                ],
                'smile',
                'parent_id',
                'parentText' => [
                    'asc' => ['parent.text' => SORT_ASC],
                    'desc' => ['parent.text' => SORT_DESC],
                    'label' => 'Parent Text',
                    'default' => SORT_ASC
                ],
                'created'
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['parent']);
            $query->joinWith(['user']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'testimonials.id' => $this->id,
            'testimonials.user_from' => $this->user_from,
            'testimonials.user_to' => $this->user_to,
            'testimonials.smile' => $this->smile,
        ]);
        $query->andFilterWhere(['like', 'testimonials.parent_id',$this->parent_id]);
        $query->andFilterWhere(['like', 'testimonials.created', $this->created]);

        $query->andFilterWhere(['like', 'testimonials.text', $this->text]);
        //$query->andWhere('testimonials.text LIKE "%'. $this->text . '%"');

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userFromFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userFromFullName . '%"'
            );
        }]);

        $query->joinWith(['user' => function ($q) {
            $q->where('user.first_name LIKE "%' . $this->userToFullName . '%"'
                .' OR user.last_name LIKE "%' . $this->userToFullName . '%"'
            );
        }]);

        if(!empty($this->parentText)) {
            $query->joinWith(['parent'=> function($q) {
                $q->where('parent.text LIKE "%' . $this->parentText . '%" ');
            }]);}

        return $dataProvider;
    }
}
