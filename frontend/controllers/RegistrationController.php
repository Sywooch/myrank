<?php

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;
use frontend\models\Registration;
use yii\helpers\Json;
use frontend\models\Company;

class RegistrationController extends Controller {

    public function actionStep1($type) {
	if (\Yii::$app->user->id !== NULL) {
	    $model = Registration::findOne(\Yii::$app->user->id);
	} else {
	    $model = new Registration();
	    $model->type = $type;
	}
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep1", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionStep1save() {
	$out['code'] = 0;
	$post = \Yii::$app->request->post();
	if ($post['Registration']['password'] != $post['Registration']['rePassword']) {
	    $out['errors'] = [
		'password' => [\Yii::t('app','PASSWORD_AND_REPEAT_DO_NOT_MATCH')]
	    ];
	} /*else if(isset(User::find()->where(['email' => $post['Registration']['email']])->id)) {
	    $out['errors'] = [
		'email' => ['Пользователь с таким адресом почты уже существует!'],
	    ];
	}*/ else {
	    //if(Registration::find()->where(['email' => $post['Registration']['email']]))
	    if(\Yii::$app->user->id === null) {
		$model = new Registration();
	    } else {
		$model = Registration::findOne(\Yii::$app->user->id);
	    }
	    $model->step = $post['Registration']['type'] == User::TYPE_USER_USER ? User::STEP_NEXT_USER : User::STEP_NEXT_COMPANY;
	    if ($model->load($post) && $model->validate()) {
		$model->setPassword($post['Registration']['password']);
		$model->generateAuthKey();
		if ($model->save()) {
		    \Yii::$app->rating->process($model);
		    $model->saveProfession();
		    $out['code'] = 1;
		    //$out['id'] = $model->id;

		    $mCompany = new Company();
		    $mCompany->user_id = $model->id;
                    $mCompany->city_id = $model->city_id;
		    $out['data'] = $this->renderPartial("_regStep" . $model->step, [
			'model' => $model,
			'mCompany' => $mCompany,
			'title' => $model->regStep($model->step)
		    ]);
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
	$post['Registration']['step'] = 0;

	if (\Yii::$app->user->id !== NULL) {
	    $post['Registration']['id'] = \Yii::$app->user->id;
	}

	$model = User::findOne($post['Registration']['id']);
	unset($post['Registration']['id']);
	if ($model->load($post, 'Registration') && $model->save()) {
	    $out['code'] = 1;
	    $out['link'] = \yii\helpers\Url::toRoute(["users/profile", "id" => $model->id]);
	    \Yii::$app->user->login($model);
	    \Yii::$app->rating->process($model);
	    \Yii::$app->user->id === NULL ? \Yii::$app->notification->set('global', \Yii::t('app','IN_ORDER_TO_USE_ALL_SERVICES_YOU_MUST').' <a href="#" class="signin">'.\Yii::t('app','AUTHORIZE').'</a>') : NULL;
	} else {
	    $out['errors'] = $model->errors;
	}
	return Json::encode($out);
	\Yii::$app->end();
    }

    public function actionStep3() {
	$model = new Company();
	if (\Yii::$app->user->id !== null) {
	    $mUser = User::getProfile();
	    if($mUser->company_id != 0) {
		$model = Company::findOne($mUser->company_id);
	    }
	}
	echo Json::encode([
	    'code' => 1,
	    'data' => $this->renderPartial("_regStep3", ['mCompany' => $model, 'title' => \Yii::t('app','REGISTRATION_STEP_2_OF_2')])
	]);
	\Yii::$app->end();
    }

    public function actionStep3save() {
	$post = \Yii::$app->request->post();
	$out['code'] = 0;

	$model = new Company();
	if (\Yii::$app->user->id !== null) {
	    $mUser = User::getProfile();
	    if($mUser->company_id > 0) {
		$model = Company::findOne($mUser->company_id);
	    }
	}

	if ($model->load($post) && $model->save()) {
	    if (\Yii::$app->user->id !== NULL) {
		$model->user_id = \Yii::$app->user->id;
	    }
	    $mUser = User::findOne($model->user_id);
	    $mUser->company_id = $model->id;
	    $mUser->company_name = $model->name;
	    $mUser->step = 0;
	    if ($mUser->save()) {
		\Yii::$app->rating->process($mUser);
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
