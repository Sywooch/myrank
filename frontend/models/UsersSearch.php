<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;

/**
 * UsersSearch represents the model behind the search form about `frontend\models\User`.
 */
class UsersSearch extends User {
    
    public $page;
    public $limit;
    public $searchName;
    public $ratingStart = 0;
    public $ratingEnd = 1000;
//    public $city_id;

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['id', 'company_id', 'profileviews', 'type', 'rating', 'gender', 'city_id'], 'integer'],
	    [['company_name', 'company_post', 'image', 'first_name', 'last_name', 'email', 'auth_key', 
		'password_hash', 'password_reset_token', 'about', 'last_login', 'birthdate', 'phone', 
		'site', 'mark', 'marks_config', 'searchName', 'ratingStart', 'ratingEnd', 
		'professionField', 'limit', 'page'], 'safe'],
	];
    }

    /**
     * @inheritdoc
     *
    public function scenarios() {
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
    public function search($params) {
	$query = User::find()->joinWith("userProfession");
	
	if(isset($params['UsersSearch']['searchName']) && ($params['UsersSearch']['searchName'] != "")) {
	    if(strpos($params['UsersSearch']['searchName'], " ") != FALSE) {
		$nameArr = explode(" ", $params['UsersSearch']['searchName']);
		$params['UsersSearch']['first_name'] = $nameArr[1];
		$params['UsersSearch']['last_name'] = $nameArr[0];
	    } else {
		$params['UsersSearch']['last_name'] = str_replace(" ", "", $params['UsersSearch']['searchName']);
	    }
	}
	$this->load($params);

	// grid filtering conditions
	$query->andFilterWhere([
	    'id' => $this->id,
	    'company_id' => $this->company_id,
	    'type' => $this->type,
	    'birthdate' => $this->birthdate,
	    'gender' => $this->gender,
	    'city_id' => $this->city_id,
	    'last_name' => $this->last_name,
	    'first_name' => $this->first_name,
	    'profession_id' => $this->professionField
	]);

	$query->andFilterWhere(['between', 'rating', $this->ratingStart, $this->ratingEnd])
		->andFilterWhere(['like', 'about', $this->about]);
	
	return $query;
    }

}
