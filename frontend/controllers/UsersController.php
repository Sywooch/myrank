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
use frontend\models\UserNotification;
use yii\web\NotFoundHttpException;
use frontend\models\Registration;
use frontend\models\Company;
use frontend\models\Marks;

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
      'rules' => [
      [
      'actions' => ['search', 'error'],
      'allow' => true,
      ],
      [
      'actions' => ['profile'],
      'allow' => true,
      'roles' => ['@'],
      ],
      ],
      ],
      ];
      } */

    public function actionProfile() {
	$req = \Yii::$app->request->get();
	if (!isset($req['id'])) {
	    $req['id'] = \Yii::$app->user->id;
	}
	$mUser = User::findOne($req['id']);
	if (isset($mUser->id)) {
	    return $this->render("profile", [
			'mUser' => $mUser,
	    ]);
	} else {
	    throw new NotFoundHttpException(\Yii::t('app','REQUESTED_PAGE_WAS_NOT_FOUND'));
	}
    }

    public function actionPhotouserupload() {
	\Yii::$app->session->remove('userImages');
	$uId = \Yii::$app->user->id;
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('modal/uploadPhotoUser')]);
    }
    
    public function actionSaveuserimage () {
	$arr = \Yii::$app->session->get('userImages');
	
	$mUser = User::getProfile();
	$mUser->image = $arr[0];
	
	$out['code'] = $mUser->save() ? 1 : 0;
	
	echo Json::encode($out);
	\Yii::$app->end();
    }

    public function actionSavemarks($id) {
	$req = \Yii::$app->request->post('mark');
	$code = 0;

	$mUser = User::findOne($id);
	if ($mUser->owner) {
	    $mUser->mark = \yii\helpers\Json::encode($req);
	    echo Json::encode(['code' => $mUser->save() ? 1 : 0, 'error' => $mUser->errors]);
	} else {
	    $mMarks = UserMarks::find()->where(['user_to' => $mUser->id, 'user_from' => \Yii::$app->user->id])->one();
	    if (!isset($mMarks->description)) {
		$mMarks = new UserMarks();
	    }
	    $mMarks->attributes = [
		'user_to' => $mUser->id,
		'user_from' => \Yii::$app->user->id,
		'description' => Json::encode($req),
	    ];

	    if (isset($req[0])) {
		foreach ($req[0] as $key => $item) {
		    $query = [
			'user_from' => \Yii::$app->user->id,
			'user_to' => $mUser->id,
			'mark_id' => $key,
		    ];

		    $mUserMarkRating = UserMarkRating::find()->where($query)->one();
		    if (!isset($mUserMarkRating->id)) {
			$mUserMarkRating = new UserMarkRating();
		    }
		    $query['mark_val'] = $item;
		    $mUserMarkRating->attributes = $query;
		    $mUserMarkRating->save();
		}
		$rating = \Yii::$app->rating->process($mUser);
	    }
	    if ($mMarks->save()) {
		$code = 1;
		isset($mMarks->id) ?: \Yii::$app->notification->saveNotif(UserNotification::NOTIF_TYPE_MARKS, $mMarks->user_to);
		\Yii::$app->notification->set('global', \Yii::t('app','YOUR_SCORE_HAS_BEEN_SAVED'));
	    }
	    echo Json::encode(['code' => $code, 'error' => $mMarks->errors, 'out' => $rating]);
	}
	\Yii::$app->end();
    }
    
    public function actionConfigmarks () {
	$model = Marks::findAll(['parent_id' => 0, 'required' => 0]);
	$mUser = User::getProfile();
	if(!is_null($mUser->marks_config)) {
	    $configArr = Json::decode($mUser->marks_config, true);
	} else {
	    $configArr = [];
	}
	echo Json::encode([
	    'code' => 1, 
	    'data' => $this->renderPartial('modal/configMarks', ['model' => $model, 'configArr' => $configArr])
	]);
	\Yii::$app->end();
    }
    
    public function actionConfigmarkssave () {
	$post = \Yii::$app->request->post('Marks');
	$mUser = User::getProfile();
	$mUser->marks_config = Json::encode($post);
	echo Json::encode(['code' => $mUser->save() ? 1 : 0]);
    }

    /**
     * Модальное окно комментария
     * @param int $id - айди юзверя, которому адресован коммент
     */
    public function actionWritetestimonials($id) {
	$param = \Yii::$app->request->post('param');
	$mUser = User::getProfile();
	$model = new Testimonials();
	$out = $this->renderPartial("modal/modalWriteTestimonial", [
	    'model' => $model,
	    'mUser' => $mUser,
	    'user_to' => $id,
	    'parent' => isset($param['parent']) ? $param['parent'] : 0
	]);
	echo Json::encode(['code' => 1, 'data' => $out, 'title' => \Yii::t('app','GIVE_FEEDBACK')]);
	\Yii::$app->end();
    }
    
    public function actionEdittestimonial ($id) {
	$model = Testimonials::findOne($id);
	$mUser = User::getProfile();
	$out = $this->renderPartial("modal/modalWriteTestimonial", [
	    'model' => $model,
	    'mUser' => $mUser,
	    'user_to' => $model->user_to,
	    'parent' => $model->parent_id
	]);
	echo Json::encode(['code' => 1, 'data' => $out, 'title' => \Yii::t('app','TESTIMONIALS_EDIT')]);
	\Yii::$app->end();
    }

    /**
     * Сохранение комента
     */
    public function actionSavetestimonials() {
	$post = \Yii::$app->request->post();
	$code = 0;
	$model = Testimonials::findOne([
	    'user_to' => $post['Testimonials']['user_to'],
	    'user_from' => $post['Testimonials']['user_from'],
	]);
	if(!isset($model->id)) {
	    $model = new Testimonials();
	} else {
	    Testimonials::deleteAll(['parent_id' => $model->id]);
	}
	
	if ($model->load($post) && $model->save()) {
	    \Yii::$app->rating->process(User::findOne($model->user_to));
	    \Yii::$app->notification->saveNotif(UserNotification::NOTIF_TYPE_TESTIMONIALS, $model->user_to);
	    $code = 1;
	}
	echo Json::encode(['code' => $code, 'errors' => $model->errors]);
    }

    public function actionSendclaim() {
	$post = \Yii::$app->request->post();
	if (isset($post['param'])) {
	    $mClaim = UserClaim::findOne($post['id']);
	    if (!isset($mClaim->id)) {
		$mClaim = new UserClaim();
		$mClaim->attributes = [
		];
	    }
	}
	echo Json::encode(['code' => 1]);
    }

    // Edit profile
    public function actionEditmaininfo() {
	$uId = \Yii::$app->user->id;
	$model = Registration::findOne($uId);
	$profArr = [];
	if ($model->type) {
	    $mCompany = (isset($model->company)) ? $model->company : new Company();
	    foreach ($mCompany->companyProfession as $item) {
		$profArr[] = $item->id;
	    }
	    $mCompany->professionField = $profArr;
	    $mCompany->country_id = $mCompany->countryCity;
	    $out = $this->renderPartial("modal/editCompany", [
		'mCompany' => $mCompany,
		'model' => $model,
		'title' => \Yii::t('app','EDITING_COMPANY'),
	    ]);
	} else {
	    foreach ($model->userProfession as $item) {
		$profArr[] = $item->id;
	    }
	    $model->professionField = $profArr;
	    $model->country_id = $model->countryCity;

	    $out = $this->renderPartial("modal/mainInfo", ['model' => $model]);
	}
	\Yii::$app->rating->process($model);
	echo Json::encode(['code' => 1, 'data' => $out]);
	\Yii::$app->end();
    }
    
    public function actionEditcompanysave () {
	$post = \Yii::$app->request->post();
	$uId = \Yii::$app->user->id;
	$mUser = User::getProfile();
	$mCompany = $mUser->company;
	$out['code'] = 0;
	if ($mCompany->load($post) && $mCompany->validate()) {
	    if ($mCompany->validate()) {
		$out['code'] = $mCompany->save();
		\Yii::$app->rating->process($mUser);
	    } else {
		$out['errors'] = ['password' => [\Yii::t('app','PASSWORD_AND_REPEAT_DO_NOT_MATCH')]];
	    }
	} else {
	    $out['errors'] = $mUser->errors;
	}
	echo Json::encode($out);
	\Yii::$app->end();
    }

    public function actionSavemaininfo() {
	$post = \Yii::$app->request->post();
	$uId = \Yii::$app->user->id;
	$mUser = Registration::findOne($uId);
	$out['code'] = 0;
	if ($mUser->load($post) && $mUser->validate()) {
	    if ($mUser->validate()) {
		$out['code'] = $mUser->save();
		\Yii::$app->rating->process($mUser);
	    } else {
		$out['errors'] = ['password' => [\Yii::t('app','PASSWORD_AND_REPEAT_DO_NOT_MATCH')]];
	    }
	} else {
	    $out['errors'] = $mUser->errors;
	}
	echo Json::encode($out);
	\Yii::$app->end();
    }

    public function actionEditportfolio() {
	\Yii::$app->session->remove("userImages");
	$mUser = User::getProfile();
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('modal/editProfile', ['model' => $mUser->images])]);
	\Yii::$app->end();
    }

    public function actionViewportfolio($id) {
	$model = Images::findOne($id);
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('modal/viewPortfolio', ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionSaveportfolio() {
	$req = \Yii::$app->request->post("Images");
	$sess = \Yii::$app->session;

	if ($sess->has("userImages")) {
	    $userImages = $sess->get("userImages");
	}

	$mUser = User::getProfile();

	foreach ($req['title'] as $key => $item) {
	    if (($item != "") && isset($userImages[$key])) {
		if($req['new'][$key] == 1) {
		    $model = new \frontend\models\Images();
		} else {
		    $model = Images::findOne($req['new'][$key]);
		}

		$model->attributes = [
		    'type' => $mUser->type,
		    'type_id' => $mUser->type ? $mUser->company_id : $mUser->id,
		    'user_id' => $mUser->id,
		    'name' => $userImages[$key],
		    'title' => $item,
		    'description' => $req['description'][$key],
		];
		$model->save();
	    }
	}
	echo Json::encode(['code' => 1]);
    }

    public function actionGetcities() {
	$post = \Yii::$app->request->post('id');
	$model = \frontend\models\City::find()->where(['country_id' => $post])->all();
	$out = "";
	foreach ($model as $item) {
	    $out .= "<option value='" . $item->city_id . "'>" . $item->name . "</option>\n";
	}
	echo $out;
	\Yii::$app->end();
    }

    public function actionTrustees($id) {
	$post = \Yii::$app->request->post();
	$user_from = \Yii::$app->user->id;
	$params = ['user_to' => $id, 'user_from' => $user_from];
	$mTrus = UserTrustees::find()->where($params)->one();
	if (isset($mTrus->id)) {
	    $out['code'] = $mTrus->delete() ? 1 : 0;
	    $out['addClass'] = 0;
	    $out['data'] = \Yii::t('app','IN_TRUSTED');
	} else {
	    $mTrus = new UserTrustees();
	    $mTrus->attributes = $params;
	    $out['code'] = $mTrus->save() ? 1 : 0;
	    $out['addClass'] = 1;
	    $out['data'] = \Yii::t('app','TRUSTED');
	}
	\Yii::$app->rating->process(User::findOne($id));
	echo Json::encode($out);
	\Yii::$app->end();
    }

    public function actionSearch() {
	$req = \Yii::$app->request->get();
	
	if(!isset($req['UsersSearch']['limit'])) {
	    $req['UsersSearch']['limit'] = User::LIMIT_VIEW;
	}

	$model = new UsersSearch();
	$modelSearch = $model->search($req);
	$query = clone $modelSearch;
	
	$pagin['count'] = $query->count();
	$maxPage = $pagin['count'] / $req['UsersSearch']['limit'];
	
	$pagin['pages'] = (int)$maxPage + 1;
	
	if(!isset($req['UsersSearch']['page'])) {
	    $req['UsersSearch']['page'] = 1;
	}
	
	$start = $req['UsersSearch']['limit'] * $req['UsersSearch']['page'] - $req['UsersSearch']['limit'];
	$search = $modelSearch->limit($req['UsersSearch']['limit'])->offset($start)->all();
	
	$model->load($req);
	return $this->render("search", ['model' => $model, 'mSearch' => $search, 'pagin' => $pagin]);
    }

    public function actionUserslist($startsWith) {
	$model = User::find()
		->select(['last_name', 'type', 'first_name', 'company.name'])
		->joinWith(['company'])
		->where(['like', 'last_name', $startsWith])
		->orWhere(['like', 'first_name', $startsWith])
		->orWhere(['like', 'company.name', $startsWith])
		->asArray()
		->all();
	foreach ($model as $item) {
	    if($item['type'] == User::TYPE_USER_COMPANY) {
		$out['users'][]['name'] = $item['name'];
	    } else {
		$out['users'][]['name'] = $item['last_name'] . " " . $item['first_name'];
	    }
	}
	return Json::encode($out);
    }

    public function actionLastmarksuser($id) {
	$model = UserMarks::find()->where(['user_to' => $id])->all();
	echo Json::encode([
	    'code' => 1,
	    'data' => $this->renderPartial('modal/listUser', ['model' => $model, 'title' => \Yii::t('app','LATEST_RATINGS')])
	]);
	\Yii::$app->end();
    }

    public function actionMarkview($id) {
	$model = UserMarks::findOne($id);
	echo Json::encode([
	    'code' => 1,
	    'data' => $this->renderPartial('modal/viewMark', ['item' => $model, 'title' => \Yii::t('app','USER_RATING')]),
	]);
    }

    public function actionAlltrustuser($id) {
	$model = UserTrustees::find()->where(['user_from' => $id])->all();
	echo Json::encode([
	    'code' => 1,
	    'data' => $this->renderPartial('modal/allTrustUser', [
		'model' => $model, 
		'title' => \Yii::t('app','TRUSTED_PERSONS')
	    ])
	]);
	\Yii::$app->end();
    }

}
