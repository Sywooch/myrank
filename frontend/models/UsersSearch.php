<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\User;
use frontend\models\UserCompany;

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
	    [['image', 'first_name', 'last_name', 'email', 'auth_key', 
		'password_hash', 'password_reset_token', 'about', 'last_login', 'birthdate', 'phone', 
		'site', 'mark', 'marks_config', 'searchName', 'ratingStart', 'ratingEnd', 
		'professionField', 'limit', 'page'], 'safe'],
	];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        
        switch(isset($params['type']) ? $params['type'] : self::TYPE_USER_COMPANY) {
            case self::TYPE_USER_COMPANY:
                $query = Company::find()->joinWith("profession");
                isset($params['searchName']) && ($params['searchName'] != "") ? $query->andFilterWhere(['like', 'name', $params['searchName']]) : NULL;
                $this->load($params, '');
                $query->andFilterWhere([
                    'profession_id' => $this->professionField
                ]);
                break;
            case self::TYPE_USER_USER:
                $query = User::find()->joinWith("userProfession")->where(['type' => User::TYPE_USER_USER]);
                if(isset($params['searchName']) && ($params['searchName'] != "")) {
                    if(strpos($params['searchName'], " ") != FALSE) {
                        $nameArr = explode(" ", $params['searchName']);
                        $query->andOnCondition("(first_name = :firstName AND last_name = :lastName) OR (first_name = :lastName AND last_name = :firstName)", [':firstName' => $nameArr[1], ':lastName' => $nameArr[0]]);
                    } else {
                        $query->andOnCondition("first_name LIKE :param OR last_name LIKE :param", [':param' => "%".str_replace(" ", "", $params['searchName'])."%"]);
                    }
                }
                unset($params['searchName']);
                $this->load($params, '');
                $query->andFilterWhere([
                    'profession_id' => $this->professionField
                ]);
                break;
        }
        $query->andFilterWhere(['between', 'rating', $this->ratingStart, $this->ratingEnd]);
        $query->orderBy("rating DESC");

	return $query;
    }

}
