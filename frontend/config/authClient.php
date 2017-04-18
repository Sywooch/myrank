<?php

return [
    'class' => 'yii\authclient\Collection',
    'clients' => [
	'vkontakte' => [
	    'class' => 'yii\authclient\clients\VKontakte',
	    'clientId' => '5870995',
	    'clientSecret' => 'DGSTWkE9eYWiotx3XITH',
	    'attributeNames' => [
		'photo_200'
	    ]
	],
	'facebook' => [
	    'class' => 'yii\authclient\clients\Facebook',
	    'clientId' => '1405362859486055',
	    'clientSecret' => '2acc30492673a458348ec802a89f9064',
	],
    ]
];
