<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\User;
/**
 * Description of UserController
 *
 * @author dmitrywp
 */
class UserController extends Controller {
    
    public function actionProfile ($id) {
	$mUser = User::findOne($id);
	return $this->render("profile", [
	    'mUser' => $mUser,
	]);
    }
    
    public function actionSavemarks ($id) {
	$req = \Yii::$app->request->post('mark');
	
	$mUser = User::findOne($id);
	$mUser->mark = \yii\helpers\Json::encode($req);
	echo \yii\helpers\Json::encode(['status' => $mUser->save() ? 1 : 0, 'error' => $mUser->errors]);
    }
}
