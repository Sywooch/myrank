<?php
namespace frontend\controllers;

use yii\web\Controller;
use app\models\User;
/**
 * Description of UserController
 *
 * @author dmitrywp
 */
class UserController extends Controller {
    
    public function actionProfile ($id) {
	$mUser = User::findOne($id);
	return $this->render("profile", ['mUser' => $mUser]);
    }
}
