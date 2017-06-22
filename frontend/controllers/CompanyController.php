<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\controllers;

use frontend\components\Controller;
use frontend\models\Company;

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
    
    public function findModel ($id) {
        $model = Company::findOne($id);
    }
}
