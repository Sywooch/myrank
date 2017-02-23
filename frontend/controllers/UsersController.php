<?php
namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;
use yii\helpers\Json;
use frontend\models\UserMarks;
use frontend\models\UserTrustees;
/**
 * Description of UserController
 *
 * @author dmitrywp
 */
class UsersController extends Controller {
    
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
	    echo Json::encode(['code' => $mMarks->save() ? 1 : 0, 'error' => $mMarks->errors]);
	}
	\Yii::$app->end();
    }
    
    public function actionWritetestimonials () {
	$out = $this->renderPartial("_modalWriteTestimonial");
	echo Json::encode(['code' => 1, 'data' => $out, 'title' => 'Оставить отзыв']);
	\Yii::$app->end();
    }
    
    // Edit profile
    public function actionEditmaininfo () {
	$model = User::getProfile();
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
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('_editProfile')]);
	\Yii::$app->end();
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
}
