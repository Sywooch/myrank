<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\User;
use frontend\models\UserMarks;
use frontend\models\UserTrustees;
use frontend\models\Testimonials;
use backend\models\UserClaim;
use frontend\models\UserMarkRating;
use frontend\models\UsersSearch;
use frontend\models\City;
use frontend\models\Images;
use frontend\models\UserNotification;
use frontend\models\Registration;
use frontend\models\Company;
use frontend\models\Marks;
use frontend\models\UserMarksCustom;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use frontend\models\UserConstant;

/**
 * Description of UserController
 *
 * @author dmitrywp
 */
class UsersController extends Controller {

    public function actionProfile() {
        $req = \Yii::$app->request->get();
        if (!isset($req['id'])) {
            $req['id'] = \Yii::$app->user->id;
        }
        $mUser = User::findOne($req['id']);
        if (isset($mUser->id) && !$mUser->isCompany) {
            return $this->render("profile", [
                        'model' => $mUser,
            ]);
        } else {
            throw new NotFoundHttpException(\Yii::t('app', 'REQUESTED_PAGE_WAS_NOT_FOUND'));
        }
    }

    public function actionPhotouserupload() {
        \Yii::$app->session->remove('userImages');
        //$uId = \Yii::$app->user->id;
        echo Json::encode(['code' => 1, 'data' => $this->renderPartial('modal/uploadPhotoUser')]);
    }

    public function actionSaveuserimage() {
        $arr = \Yii::$app->session->get('userImages');

        $mObj = UserConstant::getProfile();
        $mObj->image = $arr[0];

        $out['code'] = $mObj->save() ? 1 : 0;

        echo Json::encode($out);
        \Yii::$app->end();
    }

    public function actionSavemarks($id, $typeTo) {
        $req = \Yii::$app->request->post('mark');
        $code = 0;

        if ($typeTo == UserConstant::TYPE_USER_COMPANY) {
            $model = Company::findOne($id);
        } else {
            $model = User::findOne($id);
        }

        if ($model->owner) {
            $model->mark = \yii\helpers\Json::encode($req);
            echo Json::encode(['code' => $model->save() ? 1 : 0, 'error' => $model->errors]);
        } else {
            $mUserFrom = \Yii::$app->user->identity;

            $attrs = [
                'to_id' => $id,
                'from_id' => $mUserFrom->objId,
                'type_to' => $typeTo,
                'type_from' => $mUserFrom->objType,
            ];

            $mMarks = UserMarks::find()->where($attrs)->one();
            if (!isset($mMarks->description)) {
                $mMarks = new UserMarks();
            }

            $mMarks->attributes = array_merge($attrs, [
                'description' => Json::encode($req),
                'who_from_to' => \Yii::$app->request->post('whoFromTo')
            ]);

            if (isset($req[0])) {
                foreach ($req[0] as $key => $item) {
                    $query = array_merge($attrs, [
                        'mark_id' => $key,
                    ]);

                    $mUserMarkRating = UserMarkRating::find()->where($query)->one();
                    if (!isset($mUserMarkRating->id)) {
                        $mUserMarkRating = new UserMarkRating();
                    }
                    $query['mark_val'] = $item;
                    $mUserMarkRating->attributes = $query;
                    $mUserMarkRating->save();
                }
                $rating = \Yii::$app->rating->process($model);
                //$rating = 0;
            }
            if ($mMarks->save()) {
                $code = 1;
                \Yii::$app->notification->saveNotif(UserNotification::NOTIF_TYPE_MARKS, $mMarks->to_id, $mMarks->type_to);
                \Yii::$app->notification->set('global', \Yii::t('app', 'YOUR_SCORE_HAS_BEEN_SAVED'));
            }
            echo Json::encode(['code' => $code, 'error' => $mMarks->errors, 'out' => $rating]);
        }
        \Yii::$app->end();
    }

    public function actionConfigmarks() {
        $mUser = UserConstant::getProfile();
        $model = Marks::findAll([
            'parent_id' => 0, 
            'required' => 0,
            'type' => $mUser->objType
        ]);
        if (!is_null($mUser->marks_config)) {
            $configArr = Json::decode($mUser->marks_config, true);
        } else {
            $configArr = [];
        }
        echo Json::encode([
            'code' => 1,
            'data' => $this->renderPartial('modal/configMarks', [
                'model' => $model,
                'configArr' => $configArr,
                'mObj' => $mUser
            ])
        ]);
        \Yii::$app->end();
    }

    public function actionConfigmarkssave() {
        $post = \Yii::$app->request->post('Marks');
        $mUser = UserConstant::getProfile();
        $mUser->marks_config = Json::encode($post);
        echo Json::encode(['code' => $mUser->save() ? 1 : 0]);
    }

    public function actionCustomConfigMarks($id, $obj_id, $obj_type) {
        $mMarks = Marks::findOne($id);
        $mObj = UserConstant::findModel(['type' => $obj_type, 'id' => $obj_id]);

        if (($mMarks->parent_id == 0) && $mMarks->configure) {
            $mMarksArr = UserConstant::marksArr($mObj->configMarks, UserConstant::TYPE_MARKS_HIDE);
            $mUMC = UserMarksCustom::find()->where(['user_id' => $obj_id, 'user_type' => $obj_type])->asArray()->all();
            foreach ($mUMC as $item) {
                $mUmcArr[$item['mark_id']] = 1;
            }
            echo Json::encode([
                'code' => 1,
                'data' => $this->renderPartial("modal/customconfigmarks", [
                    'model' => $mMarksArr,
                    'id' => $id,
                    'mUMC' => $mUmcArr,
                ])
            ]);
        } else {
            echo Json::encode(['code' => 0]);
        }
    }

    public function actionCustomConfigMarksSave($id) {
        $mObj = UserConstant::getProfile();
        $post = \Yii::$app->request->post('UserMarksCustom');

        UserMarksCustom::deleteAll(['user_id' => $mObj->id, 'user_type' => $mObj->objType]);

        foreach ($post['marks'] as $item) {
            $mUMC = new UserMarksCustom();
            $mUMC->user_id = $mObj->objId;
            $mUMC->user_type = $mObj->objType;
            $mUMC->parent_id = $id;
            $mUMC->mark_id = $item;
            $mUMC->save();
        }

        echo Json::encode(['code' => 1]);
    }

    /**
     * Модальное окно комментария
     * @param int $id - айди юзверя, которому адресован коммент
     */
    public function actionWritetestimonials($id, $typeTo) {
        $param = \Yii::$app->request->post('param');
        $mObj = UserConstant::getProfile();
        $model = new Testimonials();
        $model->type_from = $mObj->objType;
        $model->from_id = $mObj->id;
        $model->type_to = $typeTo;
        $model->to_id = $id;
        $model->parent_id = isset($param['parent']) ? $param['parent'] : 0;

        $out = $this->renderPartial("modal/modalWriteTestimonial", [
            'model' => $model,
            'mObj' => $mObj
        ]);
        echo Json::encode(['code' => 1, 'data' => $out, 'title' => \Yii::t('app', 'GIVE_FEEDBACK')]);
        \Yii::$app->end();
    }

    public function actionEdittestimonial($id) {
        $model = Testimonials::findOne($id);
        $mUser = UserConstant::getProfile();
        $out = $this->renderPartial("modal/modalWriteTestimonial", [
            'model' => $model,
            'mObj' => $mUser,
        ]);
        echo Json::encode(['code' => 1, 'data' => $out, 'title' => \Yii::t('app', 'TESTIMONIALS_EDIT')]);
        \Yii::$app->end();
    }

    /**
     * Сохранение комента
     */
    public function actionSavetestimonials() {
        $post = \Yii::$app->request->post('Testimonials');
        $code = 0;
        $model = Testimonials::findOne([
                    'type_from' => $post['type_from'],
                    'from_id' => $post['from_id'],
                    'type_to' => $post['type_to'],
                    'to_id' => $post['to_id'],
        ]);
        if (!isset($model->id)) {
            $model = new Testimonials();
        }

        if ($model->load($post, '') && $model->save()) {
            \Yii::$app->rating->process(UserConstant::findModel(['id' => $model->to_id, 'type' => $model->type_to]));
            \Yii::$app->notification->saveNotif(UserNotification::NOTIF_TYPE_TESTIMONIALS, $model->to_id, $model->type_to);
            $code = 1;
        }
        echo Json::encode(['code' => $code, 'errors' => $model->errors]);
    }

    public function actionSendclaim() {
        $post = \Yii::$app->request->post();
        if (isset($post['param'])) {
            $mObj = UserConstant::getProfile();
            $mClaim = UserClaim::findOne(['obj_id' => $post['param'], 'obj' => UserClaim::OBJ_TYPE_TESTIMONIALS]);
            if (!isset($mClaim->id)) {
                $mClaim = new UserClaim();
            }
            $mClaim->attributes = [
                'obj' => UserClaim::OBJ_TYPE_TESTIMONIALS,
                'obj_id' => $post['param'],
                'user_id' => $mObj->objId,
                'user_type' => $mObj->objType,
            ];
            $code = $mClaim->save() ? 1 : 0;
        }
        echo Json::encode(['code' => $code]);
    }

    // Edit profile
    public function actionEditmaininfo() {
        $uId = \Yii::$app->user->id;
        $model = Registration::findOne($uId);
        $profArr = [];
        if ($model->isCompany) {
            $mCompany = (isset($model->company)) ? $model->company : new Company();
            foreach ($mCompany->companyProfession as $item) {
                $profArr[] = $item->id;
            }
            $mCompany->professionField = $profArr;
            $mCompany->country_id = $mCompany->countryCity;
            $out = $this->renderPartial("modal/editCompany", [
                'mCompany' => $mCompany,
                'model' => $model,
                'title' => \Yii::t('app', 'EDITING_COMPANY'),
            ]);
        } else {
            foreach ($model->userProfession as $item) {
                $profArr[] = $item->id;
            }
            $model->professionField = $profArr;
            $model->country_id = $model->countryCity;

            $out = $this->renderPartial("modal/mainInfo", ['model' => $model]);
        }
        echo Json::encode(['code' => 1, 'data' => $out]);
        \Yii::$app->end();
    }

    public function actionEditcompanysave() {
        $post = \Yii::$app->request->post();
        $mObj = UserConstant::getProfile();
        $out['code'] = 0;
        if ($mObj->load($post)) {
            if ($mObj->validate()) {
                $out['code'] = $mObj->save();
                \Yii::$app->rating->process($mObj);
            } else {
                $out['errors'] = $mObj->errors;//['password' => [\Yii::t('app', 'PASSWORD_AND_REPEAT_DO_NOT_MATCH')]];
            }
        } else {
            $out['errors'] = $mObj->errors;
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
                $out['errors'] = ['password' => [\Yii::t('app', 'PASSWORD_AND_REPEAT_DO_NOT_MATCH')]];
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
                if ($req['new'][$key] == 1) {
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
        $model = City::find()->where(['country_id' => $post])->all();
        $out = "";
        foreach ($model as $item) {
            $out .= "<option value='" . $item->city_id . "'>" . $item->name . "</option>\n";
        }
        echo $out;
        \Yii::$app->end();
    }

    public function actionTrustees($id, $typeTo) {
        $post = \Yii::$app->request->post();
        $userFrom = \Yii::$app->user->identity;
        $params = [
            'type_from' => $userFrom->objType,
            'from_id' => $userFrom->objId, // FIXME: Сделать через связующую таблицу
            'type_to' => $typeTo,
            'to_id' => $id,
        ];
        $mTrus = UserTrustees::find()->where($params)->one();
        if (isset($mTrus->id)) {
            $out['code'] = $mTrus->delete() ? 1 : 0;
            $out['addClass'] = 0;
            $out['data'] = \Yii::t('app', 'IN_TRUSTED');
        } else {
            $mTrus = new UserTrustees();
            $mTrus->attributes = $params;
            $out['code'] = $mTrus->save() ? 1 : 0;
            $out['addClass'] = 1;
            $out['data'] = \Yii::t('app', 'TRUSTED');
        }
        // FIXME: сделать рейтинг
        \Yii::$app->rating->process(UserConstant::findModel(['id' => $id, 'type' => $typeTo]));
        echo Json::encode($out);
        \Yii::$app->end();
    }

    public function actionSearch() {
        $req = \Yii::$app->request->get();

        if (!isset($req['UsersSearch']['limit'])) {
            $req['UsersSearch']['limit'] = User::LIMIT_VIEW;
        }

        $model = new UsersSearch();
        $modelSearch = $model->search($req['UsersSearch']);
        $query = clone $modelSearch;

        $pagin['count'] = $query->count();
        $maxPage = $pagin['count'] / $req['UsersSearch']['limit'];

        $pagin['pages'] = (int) $maxPage + 1;

        if (!isset($req['UsersSearch']['page'])) {
            $req['UsersSearch']['page'] = 1;
        }

        $start = $req['UsersSearch']['limit'] * $req['UsersSearch']['page'] - $req['UsersSearch']['limit'];
        $search = $modelSearch->limit($req['UsersSearch']['limit'])->offset($start)->all();

        $model->load($req);
        return $this->render("search", ['model' => $model, 'mSearch' => $search, 'pagin' => $pagin]);
    }

    public function actionUserslist($startsWith) {
        $out = [];
        $mUserArr = User::find()
                ->select(['last_name', 'type', 'first_name'])
                ->where(['like', 'last_name', $startsWith])
                ->orWhere(['like', 'first_name', $startsWith])
                ->asArray()
                ->all();
        $mCompanyArr = Company::find()
                ->select(['name'])
                ->where(['like', 'name', $startsWith])
                ->asArray()
                ->all();
        $arr = $mUserArr + $mCompanyArr;
        foreach ($arr as $item) {
            if (isset($item['name'])) {
                $out['users'][]['name'] = $item['name'];
            } else if (isset($item['type']) && ($item['type'] != User::TYPE_USER_COMPANY)) {
                $out['users'][]['name'] = $item['last_name'] . " " . $item['first_name'];
            }
        }
        return Json::encode($out);
    }

    public function actionLastmarksuser($id) {
        $model = UserMarks::find()->where(['user_to' => $id])->all();
        echo Json::encode([
            'code' => 1,
            'data' => $this->renderPartial('modal/markListUsers', ['model' => $model, 'title' => \Yii::t('app', 'LATEST_RATINGS')])
        ]);
        \Yii::$app->end();
    }

    public function actionMarkview($id) {
        $model = UserMarks::findOne($id);
        echo Json::encode([
            'code' => 1,
            'data' => $this->renderPartial('modal/viewMark', ['item' => $model, 'title' => \Yii::t('app', 'USER_RATING')]),
        ]);
    }

    public function actionAlltrustuser($id) {
        $model = UserTrustees::find()->where(['user_from' => $id])->all();
        echo Json::encode([
            'code' => 1,
            'data' => $this->renderPartial('modal/allTrustUser', [
                'model' => $model,
                'title' => \Yii::t('app', 'TRUSTED_PERSONS')
            ])
        ]);
        \Yii::$app->end();
    }

}
