<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets\user;

use frontend\models\User;

/**
 * Description of LatestUsersAdd
 *
 * @author dmitrywp
 */
class LatestUsersAddWidget extends \yii\base\Widget {
    
    public $model;


    public function init() {
	parent::init();
	$this->model = User::find()->orderBy("id DESC")->limit(User::LIMIT_VIEW)->all();
    }
    
    public function run() {
	parent::run();
	return $this->render("latestUserAdd", ['model' => $this->model]);
    }
}
