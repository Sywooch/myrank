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
	//$query = User::find()->joinWith(["userProfession", "company"])->distinct("user.id");
        
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
        /*
	$query = UserCompany::find()->select(["*", "(user.rating + company.rating) AS defRating"])->joinWith(['company', 'user']);
        
	if(isset($params['searchName']) && ($params['searchName'] != "")) {
	    if(strpos($params['searchName'], " ") != FALSE) {
		$nameArr = explode(" ", $params['searchName']);
		$params['first_name'] = $nameArr[1];
		$params['last_name'] = $nameArr[0];
	    } else {
		$params['last_name'] = str_replace(" ", "", $params['searchName']);
	    }
	}

	// grid filtering conditions
	$query->andFilterWhere([
	    'id' => $this->id,
	    //'company_id' => $this->company_id,
	    'type' => $this->type,
	    //'birthdate' => $this->birthdate,
	    //'gender' => $this->gender,
	    //'city_id' => $this->city_id,
	    //'last_name' => $this->last_name,
	    //'first_name' => $this->first_name,
	    //'profession_id' => $this->professionField
	]);
	
	if(isset($this->city_id) && ($this->city_id != "")) {
	    $query->andOnCondition("user.city_id = :cityId OR company.city_id = :cityId", [
		':cityId' => $this->city_id,
	    ]);
	}
	if(isset($this->last_name)) {
	    $query->andOnCondition("last_name = :lastName OR company.name LIKE :companyName", [
		':companyName' => "%".$this->last_name."%",
		':lastName' => $this->last_name
	    ]);
	}

	
	*/
	return $query;
    }

}
