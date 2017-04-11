<?php

namespace frontend\components;

use frontend\models\Auth;
use frontend\models\User;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;

/**
 * AuthHandler handles successful authentication via Yii auth component
 */
class AuthHandler {

    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client) {
	$this->client = $client;
    }

    public function handle() {
	$attributes = $this->client->getUserAttributes();
	\frontend\models\Logs::saveLog(var_export($attributes, true));
	$email = ArrayHelper::getValue($attributes, 'email');
	$id = ArrayHelper::getValue($attributes, 'id');
	$nickname = ArrayHelper::getValue($attributes, 'login');
	
	$userAttr = [
	    'username' => isset($nickname) ? $nickname : $email,
	    'github' => $nickname,
	    'email' => $email,
	];
	switch ($this->client->getId()) {
	    case "facebook":
		$username = explode(" ", ArrayHelper::getValue($attributes, 'name'));
		$userAttr['first_name'] = $username[0];
		$userAttr['last_name'] = $username[1];
		break;
	    case "vkontakte":
		$userAttr['first_name'] = ArrayHelper::getValue($attributes, 'first_name');
		$userAttr['last_name'] = ArrayHelper::getValue($attributes, 'last_name');
		$userAttr['email'] = $email = ArrayHelper::getValue($attributes, 'user_id');
		break;
	}
	$userAttr['step'] = 1;

	/* @var Auth $auth */
	$auth = Auth::find()->where([
		    'source' => $this->client->getId(),
		    'source_id' => $id,
		])->one();

	if (Yii::$app->user->isGuest) {
	    if ($auth) { // login
		/* @var User $user */
		$user = $auth->user;
		$this->updateUserInfo($user);
		Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
	    } else { // signup
		if ($email !== null && User::find()->where(['email' => $email])->exists()) {
		    $user = User::find()->where(['email' => $email])->one();
		    $auth = new Auth([
			    'user_id' => $user->id,
			    'source' => $this->client->getId(),
			    'source_id' => (string) $id,
			]);
		    if ($auth->save()) {
			Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
		    }
		} else {
		    $userAttr['password'] = Yii::$app->security->generateRandomString(6);
		    $user = new User($userAttr);
		    $user->generateAuthKey();
		    $user->generatePasswordResetToken();

		    $transaction = User::getDb()->beginTransaction();

		    if ($user->save()) {
			$auth = new Auth([
			    'user_id' => $user->id,
			    'source' => $this->client->getId(),
			    'source_id' => (string) $id,
			]);
			if ($auth->save()) {
			    $transaction->commit();
			    Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
			} else {
			    Yii::$app->getSession()->setFlash('error', [
				Yii::t('app', 'Unable to save {client} account: {errors}', [
				    'client' => $this->client->getTitle(),
				    'errors' => json_encode($auth->getErrors()),
				]),
			    ]);
			}
		    } else {
			Yii::$app->getSession()->setFlash('error', [
			    Yii::t('app', 'Unable to save user: {errors}', [
				'client' => $this->client->getTitle(),
				'errors' => json_encode($user->getErrors()),
			    ]),
			]);
		    }
		}
	    }
	} else { // user already logged in
	    if (!$auth) { // add auth provider
		$auth = new Auth([
		    'user_id' => Yii::$app->user->id,
		    'source' => $this->client->getId(),
		    'source_id' => (string) $attributes['id'],
		]);
		if ($auth->save()) {
		    /** @var User $user */
		    $user = $auth->user;
		    $this->updateUserInfo($user);
		    Yii::$app->getSession()->setFlash('success', [
			Yii::t('app', 'Linked {client} account.', [
			    'client' => $this->client->getTitle()
			]),
		    ]);
		} else {
		    Yii::$app->getSession()->setFlash('error', [
			Yii::t('app', 'Unable to link {client} account: {errors}', [
			    'client' => $this->client->getTitle(),
			    'errors' => json_encode($auth->getErrors()),
			]),
		    ]);
		}
	    } else { // there's existing auth
		Yii::$app->getSession()->setFlash('error', [
		    Yii::t('app', 'Unable to link {client} account. There is another user using it.', ['client' => $this->client->getTitle()]),
		]);
	    }
	}
    }

    /**
     * @param User $user
     */
    private function updateUserInfo(User $user) {
	$attributes = $this->client->getUserAttributes();
	$github = ArrayHelper::getValue($attributes, 'login');
	if ($user->github === null && $github) {
	    $user->github = $github;
	    $user->save();
	}
    }

}
