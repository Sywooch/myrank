<?php

namespace backend\controllers;

use Yii;
use frontend\components\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
//
use frontend\models\User;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     *
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
			'actions' => ['logout', 'index'],
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

    /**
     * @inheritdoc
     */
    public function actions() {
	return [
	    'error' => [
		'class' => 'yii\web\ErrorAction',
	    ],
	];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
    return $this->render('index');
    }
//
    public function actionProfile($id) {
        return $this->render('profile',
            [
                'model' => $this->findModel($id),
            ]
        );

    }
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Запрошенная страница не существует.');
        }
    }
//
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
	if (!Yii::$app->user->isGuest) {
	    return $this->goHome();
	}

	$model = new LoginForm();
	if ($model->load(Yii::$app->request->post()) && $model->login()) {
	    return $this->goBack();
	} else {
	    return $this->render('login', [
			'model' => $model,
	    ]);
	}
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
	Yii::$app->user->logout();

	return $this->goHome();
    }

}
