<?php
namespace frontend\controllers;

use frontend\components\Controller;
use yii\filters\AccessControl;
use frontend\models\User;
use yii\helpers\Json;
use frontend\models\UserMarks;
use frontend\models\UserTrustees;
use frontend\models\Testimonials;
use frontend\models\UserClaim;
use frontend\models\UserMarkRating;
use frontend\models\UsersSearch;
use frontend\models\City;
use frontend\models\Images;
/**
 * Description of UserController
 *
 * @author dmitrywp
 */
class UsersController extends Controller {
    /*
    public function behaviors() {
	return [
	    'access' => [
		'class' => AccessControl::className(),
		'rules' => [/*
		    [
			'actions' => ['login', 'error'],
			'allow' => true,
		    ],*
		    [
			'actions' => ['profile'],
			'allow' => true,
			'roles' => ['@'],
		    ],
		],
	    ],
	];
    }*/
    
    public function actionProfile () {
	$req = \Yii::$app->request->get();
	if(!isset($req['id'])) {
	    $req['id'] = \Yii::$app->user->id;
	}
	$mUser = User::findOne($req['id']);
	
	return $this->render("profile", [
	    'mUser' => $mUser,
	]);
    }
    
    public function actionSavemarks ($id) {
	$req = \Yii::$app->request->post('mark');
	
	$mUser = User::findOne($id);
	if($mUser->owner) {
	    $mUser->mark = \yii\helpers\Json::encode($req);
	    echo Json::encode(['code' => $mUser->save() ? 1 : 0, 'error' => $mUser->errors]);
	} else {
	    $mMarks = UserMarks::find()->where(['user_to' => $mUser->id, 'user_from' => \Yii::$app->user->id])->one();
	    if(!isset($mMarks->description)) {
		$mMarks = new UserMarks();
	    }
	    $mMarks->attributes = [
		'user_to' => $mUser->id,
		'user_from' => \Yii::$app->user->id,
		'description' => Json::encode($req),
	    ];
	    
	    if(isset($req[0])) {
		foreach ($req[0] as $key => $item) {
		    $query = [
			'user_from' => \Yii::$app->user->id,
			'user_to' => $mUser->id,
			'mark_id' => $key,
		    ];
		    
		    $mUserMarkRating = UserMarkRating::find()->where($query)->one();
		    if(!isset($mUserMarkRating->id)) {
			$mUserMarkRating = new UserMarkRating();
		    }
		    $query['mark_val'] = $item;
		    $mUserMarkRating->attributes = $query;
		    $mUserMarkRating->save();
		}
		$rating = \Yii::$app->rating->process($mUser);
	    }
	    echo Json::encode(['code' => $mMarks->save() ? 1 : 0, 'error' => $mMarks->errors, 'out' => $rating]);
	}
	\Yii::$app->end();
    }
    
    /**
     * Модальное окно комментария
     * @param int $id - айди юзверя, которому адресован коммент
     */
    public function actionWritetestimonials ($id) {
	$param = \Yii::$app->request->post('param');
	$mUser = User::getProfile();
	$model = new Testimonials();
	$out = $this->renderPartial("_modalWriteTestimonial", [
	    'model' => $model,
	    'mUser' => $mUser,
	    'user_to' => $id,
	    'parent' => isset($param['parent']) ? $param['parent'] : 0
	]);
	echo Json::encode(['code' => 1, 'data' => $out, 'title' => 'Оставить отзыв']);
	\Yii::$app->end();
    }
    
    /**
     * Сохранение комента
     */
    public function actionSavetestimonials () {
	$post = \Yii::$app->request->post();
	$code = 0;
	$model = new Testimonials();
	//$post['Testimonials']['status'] = Testimonials::STATUS_MODERATION;
	if($model->load($post) && $model->save()) {
	    \Yii::$app->rating->process(User::findOne($model->user_to));
	    $code = 1;
	}
	echo Json::encode(['code' => $code, 'errors' => $model->errors]);
    }
    
    public function actionSendclaim () {
	$post = \Yii::$app->request->post();
	if(isset($post['param'])) {
	    $mClaim = UserClaim::findOne($post['id']);
	    if(!isset($mClaim->id)) {
		$mClaim = new UserClaim();
		$mClaim->attributes = [
		    
		];
	    }
	}
	echo Json::encode(['code' => 1]);
    }
    
    // Edit profile
    public function actionEditmaininfo () {
	$model = User::getProfile();
	$profArr = [];
	foreach ($model->userProfession as $item) {
	    $profArr[] = $item->id;
	}
	$model->professionField = $profArr;
	$model->country_id = City::findOne($model->city_id)->country_id;
	
	$out = $this->renderPartial("_mainInfo", ['model' => $model]);
	echo Json::encode(['code' => 1, 'data' => $out]);
	\Yii::$app->end();
    }
    
    public function actionSavemaininfo () {
	$post = \Yii::$app->request->post();
	$mUser = User::getProfile();
	$out['code'] = 0;
	if($mUser->load($post) && ($post['User']['password'] == $post['User']['rePassword'])) {
	    $out['code'] = $mUser->save();
	} else {
	    $out['errors'] = ['password' => ['Пароль и повтор пароля не совпадают']];
	}
	echo Json::encode($out);
	\Yii::$app->end();
    }
    
    public function actionEditportfolio () {
	\Yii::$app->session->remove("userImages");
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('_editProfile')]);
	\Yii::$app->end();
    }
    
    public function actionViewportfolio ($id) {
	$model = Images::findOne($id);
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('_viewPortfolio', ['model' => $model])]);
	\Yii::$app->end();
    }
    
    public function actionSaveportfolio () {
	$req = \Yii::$app->request->post("Images");
	$sess = \Yii::$app->session;
	
	if($sess->has("userImages")) {
	    $userImages = $sess->get("userImages");
	}
	
	foreach ($req['title'] as $key => $item) {
	    if(($item != "") && isset($userImages[$key])) {
		$model = new \frontend\models\Images();
		$model->attributes = [
		    'user_id' => \Yii::$app->user->id,
		    'name' => $userImages[$key],
		    'title' => $item,
		    'description' => $req['description'][$key],
		];
		$model->save();
	    }
	}
	echo Json::encode(['code' => 1]);
    }
    
    public function actionGetcities () {
	$post = \Yii::$app->request->post('id');
	$model = \frontend\models\City::find()->where(['country_id' => $post])->all();
	$out = "";
	foreach ($model as $item) {
	    $out .= "<option value='".$item->city_id."'>".$item->name."</option>\n";
	}
	echo $out;
	\Yii::$app->end();
    }
    
    public function actionTrustees ($id) {
	$post = \Yii::$app->request->post();
	$user_from = \Yii::$app->user->id;
	$params = ['user_to' => $id, 'user_from' => $user_from];
	$mTrus = UserTrustees::find()->where($params)->one();
	if(isset($mTrus->id)) {
	    $out['code'] = $mTrus->delete() ? 1 : 0;
	    $out['data'] = 'В ДОВЕРЕННЫЕ';
	} else {
	    $mTrus = new UserTrustees();
	    $mTrus->attributes = $params;
	    $out['code'] = $mTrus->save() ? 1 : 0;
	    $out['data'] = 'ДОВЕРЕННЫЙ';
	}
	echo Json::encode($out);
	\Yii::$app->end();
    }
    
    public function actionSearch () {
	$post = \Yii::$app->request->post();
	$get['UsersSearch'] = \Yii::$app->request->get();
	$req = array_merge($get, $post);
	//var_dump($req);
	
	$model = new UsersSearch();
	$modelSearch = $model->search($req);
	$model->load($req);
	return $this->render("search", ['model' => $model, 'mSearch' => $modelSearch]);
    }
    
    public function actionUserslist ($startsWith) {
	$model = User::find()
		->where(['like', 'last_name', $startsWith])
		->orWhere(['like', 'first_name', $startsWith])
		->asArray()
		->all();
	foreach ($model as $item) {
	    $out['users'][]['name'] = $item['last_name']." ".$item['first_name'];
	}
	return Json::encode($out);
    }
    
    public function actionLastmarksuser ($id) {
	$model = UserMarks::find()->where(['user_to' => $id])->all();
	echo Json::encode([
	    'code' => 1, 
	    'data' => $this->renderPartial('listUser', ['model' => $model, 'title' => 'Последние оценки'])
	]);
	\Yii::$app->end();
    }
    
    public function actionAlltrustuser ($id) {
	$model = UserTrustees::find()->where(['user_from' => $id])->all();
	echo Json::encode([
	    'code' => 1, 
	    'data' => $this->renderPartial('listUser', ['model' => $model, 'title' => 'Доверенные лица'])
	]);
	\Yii::$app->end();
    } 
}
