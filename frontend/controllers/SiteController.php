<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use frontend\components\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Article;
use frontend\components\AuthHandler;
use frontend\models\User;
/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
	return [
	    'access' => [
		'class' => AccessControl::className(),
		'only' => ['logout', 'signup'],
		'rules' => [
		    [
			'actions' => ['signup'],
			'allow' => true,
			'roles' => ['?'],
		    ],
		    [
			'actions' => ['logout'],
			'allow' => true,
			'roles' => ['@'],
		    ],
		],
	    ],
	    'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		//'logout' => ['post'],
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
	    'authuser' => [
		'class' => 'yii\authclient\AuthAction',
		'successCallback' => [$this, 'onAuthSuccessUser'],
	    ],
	    'authcompany' => [
		'class' => 'yii\authclient\AuthAction',
		'successCallback' => [$this, 'onAuthSuccessCompany'],
	    ],
	];
    }

    public function onAuthSuccessUser($client) {
	Yii::$app->session->set("typeUser", User::TYPE_USER_USER);
	(new AuthHandler($client))->handle();
    }
    
    public function onAuthSuccessCompany ($client) {
	Yii::$app->session->set("typeUser", User::TYPE_USER_COMPANY);
	(new AuthHandler($client))->handle();
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
	$dataProvider = new ActiveDataProvider([
	    'query' => Article::find()
            ->where(['status' => 10,'locale'=>\Yii::$app->language])
            ->orderBy('create_time DESC')
            ->limit(4),
	    'totalCount' => 4,
	    'pagination' => [
		'pageSize' => 4,
	    ]
	]);
	return $this->render(
			'index', [
		    'listDataProvider' => $dataProvider,
	]);
    }

    public function successCallback($client) {
	$attributes = $client->getUserAttributes();
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
	$model = new LoginForm();
	echo \yii\helpers\Json::encode(['code' => 1, 'data' => $this->renderPartial("login", ['model' => $model])]);
	\Yii::$app->end();
    }

    public function actionLoginval() {
	$model = new LoginForm();
	if ($model->load(Yii::$app->request->post()) && $model->login()) {
	    echo \yii\helpers\Json::encode(['code' => 1]);
	} else {
	    echo \yii\helpers\Json::encode(['code' => 0, 'errors' => $model->errors]);
	}
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
	Yii::$app->user->logout();

	return $this->redirect(['site/index']);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
	$model = new ContactForm();
	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	    if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
		Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
	    } else {
		Yii::$app->session->setFlash('error', 'There was an error sending email.');
	    }

	    return $this->refresh();
	} else {
	    return $this->render('contact', [
			'model' => $model,
	    ]);
	}
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
	return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
	$model = new SignupForm();
	if ($model->load(Yii::$app->request->post())) {
	    if ($user = $model->signup()) {
		if (Yii::$app->getUser()->login($user)) {
		    return $this->goHome();
		}
	    }
	}

	return $this->render('signup', [
		    'model' => $model,
	]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
	$model = new PasswordResetRequestForm();
	if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	    if ($model->sendEmail()) {
		Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

		return $this->goHome();
	    } else {
		Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
	    }
	}

	return $this->render('requestPasswordResetToken', [
		    'model' => $model,
	]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
	try {
	    $model = new ResetPasswordForm($token);
	} catch (InvalidParamException $e) {
	    throw new BadRequestHttpException($e->getMessage());
	}

	if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
	    Yii::$app->session->setFlash('success', 'New password was saved.');

	    return $this->goHome();
	}

	return $this->render('resetPassword', [
		    'model' => $model,
	]);
    }

    public function actionChange() {
	$model = \frontend\models\UserMarks::find()->all();
	foreach ($model as $item) {
	    $params = \yii\helpers\Json::decode($item->description, true);
	    foreach ($params[0] as $key => $el) {
		$mUMR = new \frontend\models\UserMarkRating();
		$mUMR->attributes = [
		    'user_from' => $item->user_from,
		    'user_to' => $item->user_to,
		    'mark_id' => $key,
		    'mark_val' => $el
		];
		$mUMR->save();
	    }
	}
    }

    public function actionSetcountry($id) {
	$session = Yii::$app->session;
	$session->set('country', $id);
	Yii::$app->end();
    }
    
    public function actionChangelang () {
	$post = \Yii::$app->request->post();
	\Yii::$app->response->cookies->add(new \yii\web\Cookie([
		'name' => 'lang',
		'value' => $post['id'],
		//'path' => "/",
		//'domain' => 'myrankf.site4ever.com',
		'expire' => time() + 365 * 24 * 60 * 60,
	    ]));
    }

    public function actionTest() {
	return $this->render('test');
    }

}
