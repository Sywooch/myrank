<?php

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;
use frontend\models\Registration;
use yii\helpers\Json;
use frontend\models\Company;

class RegistrationController extends Controller {

    public function actionStep1($type) {
	$model = new Registration();
	$model->type = $type;
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep1", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionStep1save() {
	$out['code'] = 0;
	$post = \Yii::$app->request->post();
	if ($post['Registration']['password'] != $post['Registration']['rePassword']) {
	    $out['errors'] = [
		'password' => 'Пароль и повтор пароля не совпадают'
	    ];
	} else {
	    //if(Registration::find()->where(['email' => $post['Registration']['email']]))
	    $model = new Registration();
	    $model->step = $post['Registration']['type'] == User::TYPE_USER_USER ? User::STEP_NEXT_USER : User::STEP_NEXT_COMPANY;
	    if ($model->load($post) && $model->validate()) {
		$model->setPassword($post['Registration']['password']);
		$model->generateAuthKey();
		if ($model->save()) {
		    $model->saveProfession();
		    $out['code'] = 1;
		    //$out['id'] = $model->id;
		    
		    $mCompany = new Company();
		    $mCompany->user_id = $model->id;
		    $out['data'] = $this->renderPartial("_regStep".$model->step, ['model' => $model, 'mCompany' => $mCompany]);
		} else {
		    $out['errors'] = $model->errors;
		}
	    } else {
		$out['errors'] = $model->errors;
	    }
	}
	echo Json::encode($out);
	\Yii::$app->end();
    }
    
    public function actionStep2() {
	$model = new Registration();
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep2", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionStep2save() {
	$out = ['code' => 0, 'link' => '#'];
	
	$post = \Yii::$app->request->post();
	$post['User']['step'] = 0;
	
	if(\Yii::$app->user->id !== NULL) {
	    $post['User']['id'] = \Yii::$app->user->id;
	}
	
	$model = User::findOne($post['User']['id']);
	unset($post['User']['id']);
	if ($model->load($post) && $model->save()) {
	    $out['code'] = 1;
	    $out['link'] = \yii\helpers\Url::toRoute(["users/profile", "id" => $model->id]);
	    //\Yii::$app->user->login($model, 3600 * 24 * 30);
	    \Yii::$app->user->id === NULL ? \Yii::$app->notification->set('global', 'Для того чтоб пользоваться всеми сервисами сайта, надо <a href="#" class="signin">Авторизоваться</a>') : NULL;
	} else {
	    $out['errors'] = $model->errors;
	}
	return Json::encode($out);
	\Yii::$app->end();
    }
    
    public function actionStep3 () {
	$model = new Company();
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep3", ['model' => $model])]);
	\Yii::$app->end();
    }
    
    public function actionStep3save () {
	$post = \Yii::$app->request->post();
	$out['code'] = 0;
	
	$model = new Company();
	if($model->load($post) && $model->save()) {
	    $mUser = User::findOne($model->user_id);
	    $mUser->company_id = $model->id;
	    $mUser->company_name = $model->name;
	    $mUser->step = 0;
	    if($mUser->save()) {
		\Yii::$app->user->login($mUser, 3600 * 24 * 30);
	    }
	    
	    $out['code'] = 1;
	} else {
	    
	}
	$out['errors'] = $model->errors;
	echo Json::encode($out);
	
	//var_dump($post);
    }

    public function actionTest() {
	return $this->render("test");
    }

}
