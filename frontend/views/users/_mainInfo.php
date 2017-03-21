<?php

use frontend\widgets\user\ModalWidget;
use yii\helpers\Url;

echo ModalWidget::widget([
    'title' => "Редактировать профайл",
    'formOptions' => ['id' => 'editProfile', 'data-url' => Url::toRoute('users/savemaininfo')],
    'model' => $model,
    'content' => [
	'first_name' => [
	    'label' => 'Имя',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'David']
	],
	'last_name' => [
	    'label' => 'Фамилия',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'Dox']
	],
	'email' => [
	    'label' => 'Email',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'example@domain.com']
	],
	[
	    'country_id' => [
		'label' => 'Страна:',
		'divClass' => 'select-wrapper country-select',
		'type' => 'dropDownList',
		'options' => $model->countries,
	    ],
	    'city_id' => [
		'label' => 'Город:',
		'divClass' => 'select-wrapper city-select',
		'type' => 'dropDownList',
		'options' => isset($model->country_id) ? $model->getCityList($model->country_id) : [],
	    ],
	],
	'professionField' => [
	    'label' => 'Специализация:',
	    'divClass' => 'select-wrapper specialization-select',
	    //'type' => 'dropDownList',
	    'type' => 'listBox',
	    'options' => $model->profList,
	    'posOpt' => ['multiple' => true],
	    'posInfo' => "Позвольте людям узнать чем вы занимаетесь",
	],
	'about' => [
	    'label' => 'Личная информация',
	    'type' => 'textarea',
	    'options' => ['placeholder' => 'Расскажите немного о себе']
	],
	[
	    'password' => [
		'label' => 'Пароль:',
		'type' => 'passwordInput',
		'options' => ['class' => 'input-text']
	    ],
	    'rePassword' => [
		'label' => 'Повторите пароль:',
		'type' => 'passwordInput',
		'options' => ['class' => 'input-text'],
	    ]
	]
    ],
    'success' => '$("#modalView").modal("toggle");',
    'script' => '$("#user-country_id").on("change", function () {
	    id = $(this).val();
	    setCityList(id);
	});
	function setCityList (id) {
	    csrf = $("[name=\"csrf-token\"]").attr("content");
	    url = "'.Url::toRoute("users/getcities").'";
	    $.post(url, {"_csrf-frontend":csrf, "id":id}, function(data) {
		$("#user-city_id").html(data);
	    });
	}
	//setCityList($("#user-country_id").val());
	',
]);
?>