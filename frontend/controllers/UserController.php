<?php
namespace frontend\controllers;

use yii\web\Controller;
/**
 * Description of UserController
 *
 * @author dmitrywp
 */
class UserController extends Controller {
    
    public function actionProfile () {
	return $this->render("profile");
    }
}
