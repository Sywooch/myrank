<?php

$params = array_merge(
	require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

$authClient = require(__DIR__ . '/authClient.php');

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
	'request' => [
	    'csrfParam' => '_csrf-frontend',
	],
	'user' => [
	    'identityClass' => 'frontend\models\User',
	    'enableAutoLogin' => true,
	    'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
	],
	'session' => [
	    // this is the name of the session cookie used for login on the frontend
	    'name' => 'advanced-frontend',
	],
	'log' => [
	    'traceLevel' => YII_DEBUG ? 3 : 0,
	    'targets' => [
		[
		    'class' => 'yii\log\FileTarget',
		    'levels' => ['error', 'warning'],
		],
	    ],
	],
	'errorHandler' => [
	    'errorAction' => 'site/error',
	],
	'urlManager' => [
	    'enablePrettyUrl' => true,
	    'showScriptName' => false,
	    //'enableStrictParsing' => true,
	    'rules' => [
		'GET article' => 'article/index',
		'GET article/category/<category:\d+>' => 'article/index',
		'GET article/<id:\d+>' => 'article/view',
		'page/<page:[\w-]+>' => 'static-pages/index',
	    ],
	],
	'assetManager' => [
	    'bundles' => [
		'yii\web\JqueryAsset' => [
		    'js' => []
		],
	    ],
	],
	'authClientCollection' => $authClient,
	'rating' => [
	    'class' => 'frontend\components\Rating',
	],
	'userinfo' => [
	    'class' => 'frontend\components\UserInfo',
	    'country' => 9908,
	],
	'notification' => [
	    'class' => 'frontend\components\Notification'
	],
	'i18n' => [
	    'translations' => [
		'*' => [
		    'class' => 'yii\i18n\PhpMessageSource',
		    'basePath' => '@frontend/messages',
		    //'sourceLanguage' => 'ru-RU',
		    /*'fileMap' => [
			'app' => 'app.php',
			'app/error' => 'error.php',
		    ],*/
		],
	    ],
	],
    ],
    'modules' => [
	'debug' => [
	    'class' => 'yii\debug\Module',
	    'allowedIPs' => ['127.0.0.1', '::1', '178.93.55.88']
	]
    ],
    'params' => $params,
];
