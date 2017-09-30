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
use frontend\models\CompanyStruct;
use yii\helpers\Json;
use yii\helpers\Html;

class CompanyController extends Controller {

    public function actionProfile($id) {
        $model = Company::findOne($id);
        return $this->render("/users/profile", [
                    'model' => $model,
        ]);
    }

    public function actionUsers() {
        return $this->render("users");
    }

    public function actionInfo($id) {
        $model = Company::findOne($id);

        $title = \Yii::t('app', 'INFORMATION');
        return $this->render("info", [
                    'model' => $model,
                    'title' => $title,
                    'breadcrumbs' => [
                        ['label' => \Yii::t('app', 'COMPANY_PROFILE'), 'url' => ['company/profile', 'id' => $model->id]],
                        ['label' => $title, 'url' => ['company/info', 'id' => $id]]
                    ]
        ]);
    }

    public function actionStructure() {
        $mObj = UserConstant::getProfile();
        $persNoStruct = $mObj->getUsersCompany()
                ->andWhere([
                    'struct_id' => 0,
                    'admin' => 0,
                    'status' => 1
                ])
                ->all();
        $persInComp = $mObj->getUsersCompany()
                ->andWhere(['admin' => 0])
                ->all();
        return $this->render("structure", [
                    'model' => $mObj,
                    'persNoStruct' => $persNoStruct,
                    'persInComp' => $persInComp
        ]);
    }

    public function actionCreatestruct() {
        $mObj = UserConstant::getProfile();

        echo Json::encode(['code' => 1, 'data' => $this->renderPartial("modal/createStruct", ['model' => $mObj->companyStruct])]);
    }

    public function actionAddStructPart($name) {
        $out = $this->saveStruct($name);
        return Json::encode([
                    'code' => $out['code'],
                    'data' => $this->renderPartial("request/addStructurePart", ['model' => $out['model']])]);
    }

    public function actionAddChildStructPart($name, $parent) {
        $out = $this->saveStruct($name, $parent);
        return Json::encode([
                    'code' => $out['code'],
                    'data' => $this->renderPartial("request/addChildStructurePart", ['name' => $out['model']->name])]);
    }

    public function actionRemovePart($id) {
        $mObj = UserConstant::getProfile();
        $model = CompanyStruct::deleteAll([
                    'company_id' => $mObj->id,
                    'id' => $id,
        ]);
        return Json::encode(['code' => 1]);
    }

    private function saveStruct($name, $parent = 0) {
        $code = 0;
        $mObj = UserConstant::getProfile();
        $model = CompanyStruct::findOne([
                    'company_id' => $mObj->objId,
                    'name' => $name,
                    'parent_id' => $parent,
        ]);
        if (!isset($model->id)) {
            $model = new CompanyStruct();
            $model->name = $name;
            $model->company_id = $mObj->objId;
            $model->parent_id = $parent;
            $code = $model->save() ? 1 : 0;
        }
        return ['code' => $code, 'model' => $model];
    }

    public function actionAddusertostruct($user_id) {
        $mObj = UserConstant::getProfile();
        return Json::encode([
                    'code' => 1,
                    'data' => $this->renderPartial("modal/addUserToStruct", [
                        'model' => $mObj->companyStruct,
                        'userId' => $user_id
                    ])
        ]);
    }

    public function actionAddusertostructsave($structId, $userId) {
        $mUserCompany = UserCompany::findOne(['user_id' => $userId]);
        $mUserCompany->struct_id = $structId;
        return Json::encode(['code' => $mUserCompany->save() ? 1 : 0]);
    }

    public function actionPersonal() {
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

    public function actionChangestatus() {
        $out = "";
        $code = 1;
        $post = \Yii::$app->request->post();
        $mUC = UserCompany::findOne($post['id']);
        if($post['actid'] == UserCompany::STATUS_REMOVE) {
            $code = $mUC->delete() ? 1: 0;
        } else {
            $mUC->status = $post['actid'];
            isset($post['post']) && ($post['post'] != "") ? $mUC->company_post = $post['post'] : NULL;
            $code = $mUC->save() ? 1 : 0;
        }

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

    public function actionAlltrustees($id) {
        $mObj = Company::findOne($id);
        return $this->render("/profile/alltrustees", ['model' => $mObj]);
    }

    public function actionAllmarks($id) {
        $mObj = Company::findOne($id);

        return $this->render("/profile/allmarks", [
                    'model' => $mObj,
        ]);
    }

    public function actionAlltestimonials($id) {
        $mObj = Company::findOne($id);
        return $this->render("/profile/alltestimonials", ['model' => $mObj]);
    }

    public function findModel($id) {
        $model = Company::findOne($id);
    }

    public function actionRemovePortfolio($id) {
        $mImage = \frontend\models\Images::findOne($id)->delete();
        return Json::encode(['code' => $mImage ? 1 : 0]);
    }

}
