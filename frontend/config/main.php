<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

$authClient = require(__DIR__ . '/authClient.php');

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru_RU',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => false],
//	    'rememberMeDuration' => 2592000,
            'loginUrl' => ['site/login'],
            'enableSession' => true,
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'timeout' => 30 * 24 * 60 * 60,
            'cookieParams' => ['lifetime' => 30 * 24 * 60 * 60],
            'name' => 'advanced-frontend',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [/*
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.zoho.com',
                'username' => 'info@myrank.com',
                'password' => 'ANTpsk0192485-',
                'port' => '465',
                'encryption' => 'ssl',*/
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'dmitrywp@gmail.com',
                'password' => 'npushvzxwcsdimcv',
                'port' => '587',
                'encryption' => 'tls',
            ],
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
            'enableStrictParsing' => false,
            'rules' => [
                ['class' => 'frontend\components\UrlRule'],
            //'GET article' => 'article/index',
            //'GET article/category/<category:\d+>' => 'article/index',
            //'GET article/<id:\d+>' => 'article/view',
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
        'geoip' => ['class' => 'lysenkobv\GeoIP\GeoIP'],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                //'sourceLanguage' => 'ru-RU',
                /* 'fileMap' => [
                  'app' => 'app.php',
                  'app/error' => 'error.php',
                  ], */
                ],
            ],
        ],
    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '134.249.155.162', '178.93.17.102']
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['193.34.94.25', '178.93.29.190', '134.249.155.162']
        ]
    ],
    'params' => $params,
];
