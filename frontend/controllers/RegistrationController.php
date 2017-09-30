<?php

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;
use frontend\models\Registration;
use frontend\models\Company;
use frontend\models\UserCompany;
use frontend\models\registration\RegStep1;
use frontend\models\registration\RegStep2;
use frontend\models\registration\RegStep3;
use yii\helpers\Json;
use frontend\models\UserConstant;

class RegistrationController extends Controller {

    public function actionStep1($type) {
	if (\Yii::$app->user->id !== NULL) {
	    $model = RegStep1::findOne(\Yii::$app->user->id);
	} else {
	    $model = new RegStep1();
	    $model->type = $type;
	}
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep1", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionStep1save() {
	$out['code'] = 0;
	$post = \Yii::$app->request->post('RegStep1');
	if ($post['password'] != $post['rePassword']) {
	    $out['errors'] = [
		'password' => [\Yii::t('app','PASSWORD_AND_REPEAT_DO_NOT_MATCH')]
	    ];
	}  else {
	    if(\Yii::$app->user->id === null) {
		$model = new RegStep1();
	    } else {
		$model = RegStep1::findOne(\Yii::$app->user->id);
	    }
	    $model->step = $post['type'] == User::TYPE_USER_USER ? User::STEP_NEXT_USER : User::STEP_NEXT_COMPANY;
	    if ($model->load($post, '') && $model->validate()) {
		$model->setPassword($post['password']);
		$model->generateAuthKey();
		if ($model->save()) {
                    
		    //\Yii::$app->rating->process($model);
		    $model->saveProfession();
		    $out['code'] = 1;
                    
                    switch ($model->step) {
                        case User::STEP_NEXT_USER:
                            $mRegStep = RegStep2::findOne($model->id);
                            break;
                        case User::STEP_NEXT_COMPANY:
                            $mRegStep = RegStep3::findOne($model->id);
                            break;
                    }

		    $mCompany = new Company();
		    $mCompany->user_id = $model->id;
                    $mCompany->city_id = $model->city_id;
		    $out['data'] = $this->renderPartial("_regStep" . $model->step, [
			'model' => $mRegStep,
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
	$model = new RegStep2();
	echo Json::encode(['code' => 1, 'data' => $this->renderPartial("_regStep2", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionStep2save() {
	$out = ['code' => 0, 'link' => '#'];
	$post = \Yii::$app->request->post('RegStep2');
	$post['step'] = 0;

	if (\Yii::$app->user->id !== NULL) {
	    $post['id'] = \Yii::$app->user->id;
	}

	$model = RegStep2::findOne($post['id']);
	unset($post['id']);
	if ($model->load($post, '') && $model->save()) {
            $mCompany = Company::findOne(['name' => $post['company_name']]);
            $mUserCompany = new UserCompany();
            $mUserCompany->user_id = $model->id;
            $mUserCompany->company_post = $post['company_post'];
            if(isset($mCompany->id)) {
                $mUserCompany->company_id = $mCompany->id;
            } else {
                $mUserCompany->company_name = $post['company_name'];
            }
            $mUserCompany->save();
            
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
	$model = new RegStep3();
	if (\Yii::$app->user->id !== null) {
	    $mUser = User::getProfile();
	    if($mUser->company_id != 0) {
		$model = RegStep3::findOne($mUser->company_id);
	    }
	}
	echo Json::encode([
	    'code' => 1,
	    'data' => $this->renderPartial("_regStep3", ['mCompany' => $model, 'title' => \Yii::t('app','REGISTRATION_STEP_2_OF_2')])
	]);
	\Yii::$app->end();
    }

    public function actionStep3save() {
	$post = \Yii::$app->request->post('Company');
	$out['code'] = 0;

	$model = new RegStep3();
	if (\Yii::$app->user->id !== null) {
	    $mObj = UserConstant::getProfile();
            $model = RegStep3::findOne($mObj->id);
	}

	if ($model->load($post, '') && $model->save()) {
	    if (\Yii::$app->user->id !== NULL) {
		$model->user_id = \Yii::$app->user->id;
	    }
            
            $mUserCompany = UserCompany::findOne(['user_id' => $model->user_id]);
            if(!isset($mUserCompany->id)) {
                $mUserCompany = new UserCompany();
            }
            $mUserCompany->user_id = $model->user_id;
            $mUserCompany->company_id = $model->id;
            $mUserCompany->admin = 1;
            $mUserCompany->save();
            
	    $mUser = User::findOne($model->user_id);
	    $mUser->step = 0;
	    //$mUser->company_id = $model->id;
	    //$mUser->company_name = $model->name;
            
	    if ($mUser->save()) {
		\Yii::$app->rating->process($model);
		\Yii::$app->user->login($mUser, 3600 * 24 * 30);
	    }

	    $out['code'] = 1;
	} else {
	    
	}
	$out['errors'] = $model->errors;
	echo Json::encode($out);

	//var_dump($out);
    }

    public function actionTest() {
	return $this->render("test");
    }
    
    public function actionGetListCompanies ($startsWith) {
        $out = [];
        $mCompanyArr = Company::find()
                ->select(['name'])
                ->where(['like', 'name', $startsWith])
                ->asArray()
                ->all();
        $arr = $mCompanyArr;
        foreach ($arr as $item) {
            if (isset($item['name'])) {
                $out['users'][]['name'] = $item['name'];
            } else if (isset($item['type']) && ($item['type'] != User::TYPE_USER_COMPANY)) {
                $out['users'][]['name'] = $item['last_name'] . " " . $item['first_name'];
            }
        }
        return Json::encode($out);
    }

}
