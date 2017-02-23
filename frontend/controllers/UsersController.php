<?php
namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;
use yii\helpers\Json;
use frontend\models\UserMarks;
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
	    $mMarks = new UserMarks();
	    $mMarks->attributes = [
		'user_to' => $mUser->id,
		'user_from' => \Yii::$app->user->id,
		'description' => Json::encode($req),
	    ];
	    echo Json::encode(['code' => $mMarks->save() ? 1 : 0, 'error' => $mMarks->errors]);
	}
    }
    
    public function actionWritetestimonials () {
	$out = $this->renderPartial("_modalWriteTestimonial");
	echo Json::encode(['code' => 1, 'data' => $out, 'title' => 'Оставить отзыв']);
    }
    
    // Edit profile
    public function actionEditmaininfo () {
	$model = User::getProfile();
	$out = $this->renderPartial("_mainInfo", ['model' => $model]);
	echo Json::encode(['code' => 1, 'data' => $out]);
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
    }
    
    public function actionEditportfolio () {
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial('_editProfile')]);
    }
    
    public function actionGetcities () {
	$post = \Yii::$app->request->post('id');
	$model = \frontend\models\City::find()->where(['country_id' => $post])->all();
	$out = "";
	foreach ($model as $item) {
	    $out .= "<option value='".$item->city_id."'>".$item->name."</option>\n";
	}
	echo $out;
    }
}
