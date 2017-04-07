<?php

namespace backend\components;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class Controller extends \yii\web\Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
	return [
	    'access' => [
		'class' => AccessControl::className(),
		'rules' => [
		    [
			'actions' => ['login', 'error'],
			'allow' => true,
		    ],
		    [
			'actions' => ['*'],
			'allow' => true,
			'roles' => ['@'],
		    ],
		],
	    ],
	    'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		    'logout' => ['post'],
		],
	    ],
	];
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

