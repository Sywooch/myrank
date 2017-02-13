<?php

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;

class RegistrationController extends Controller {

    public function actionStep1() {
	$model = new User();
	echo \yii\helpers\Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep1", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionStep1save() {
	$out['code'] = 0;
	$post = \Yii::$app->request->post();
	$model = new User();
	if ($model->load($post)) {
	    //$model->setPassword($this->password);
	    //$model->generateAuthKey();
	    if($model->save()) {
		$out['code'] = 1;
		$out['id'] = $model->id;
		$out['data'] = $this->renderPartial("_regStep2user", ['model' => $model]);
	    } else {
		$out['errors'] = ['one' => ['Ошибка']];
	    }
	} else {
	    $out['errors'] = $model->errors;
	}
	echo \yii\helpers\Json::encode($out);
	\Yii::$app->end();
    }

    public function actionStep2save() {
	$out = ['code' => 0, 'link' => '#'];
	$post = \Yii::$app->request->post();
	$model = User::findOne($post['User']['id']);
	unset($post['User']['id']);
	if ($model->load($post) && $model->save()) {
	    $out['code'] = 1;
	    $out['link'] = \yii\helpers\Url::toRoute(["user/profile", "id" => $model->id]);
	} else {
	    $out['errors'] = $model->errors;
	}
	return \yii\helpers\Json::encode($out);
	\Yii::$app->end();
    }
    
    public function actionTest () {
	return $this->render("test");
    }

}
