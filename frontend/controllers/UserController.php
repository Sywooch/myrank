<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\User;
use app\models\Images;
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
}
