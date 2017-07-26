<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\Company;
use frontend\models\UserConstant;
use frontend\models\UserCompany;
use yii\helpers\Json;
use yii\helpers\Html;

class CompanyController extends Controller {
    
    public function actionProfile ($id) {
        $model = Company::findOne($id);
        return $this->render("/users/profile", ['model' => $model]); 
    }
    
    public function actionUsers () {
        return $this->render("users");
    }
    
    public function actionInfo ($id) {
        $model = Company::findOne($id);
        return $this->render("info", ['model' => $model]); 
    }
    
    public function actionStructure () {
        return $this->render("structure");
    }
    
    public function actionCreatestruct () {
        $mObj = UserConstant::getProfile();
        echo Json::encode(['code' => 1, 'data' => $this->renderPartial("modal/createStruct")]);
    }
    
    public function actionPersonal () {
        $mObj = UserConstant::getProfile();
        $params = [
            'company_id' => $mObj->objId, 
            'admin' => UserCompany::USER_NOADMIN,
        ];
        $model = UserCompany::findAll(array_merge($params, [
            'status' => UserCompany::STATUS_REQUEST,
        ]));
        $mAct = UserCompany::findAll(array_merge($params, [
            'status' => UserCompany::STATUS_CONFIRM
        ]));
        return $this->render("personal", ['model' => $model, 'mAct' => $mAct]);
    }
    
    public function actionChangestatus () {
        $out = "";
        $code = 1;
        $post = \Yii::$app->request->post();
        $mUC = UserCompany::findOne($post['id']);
        $mUC->status = $post['actid'];
        isset($post['post']) && ($post['post'] != "") ? $mUC->company_post = $post['post'] : NULL;
        $code = $mUC->save() ? 1 : 0;
        
        switch ($post['actid']) {
            case UserCompany::STATUS_CONFIRM:
                $out = Html::tag("div", Html::a("Удалить", "#", [
                    'class' => "b-link b-link_red action_but",
                    'data-id' => UserCompany::ACTION_BUT_REMOVE
                ]));
                break;
            case UserCompany::STATUS_REFUSE:
                break;
            case UserCompany::STATUS_REMOVE:
                break;
        }
        echo Json::encode(['code' => $code, 'data' => $out]);
    }


    public function findModel ($id) {
        $model = Company::findOne($id);
    }
}
