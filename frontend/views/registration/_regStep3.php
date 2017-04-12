<?php

use frontend\widgets\user\ModalWidget;
use yii\helpers\Url;

echo ModalWidget::widget([
    'title' => $title,
    'model' => $mCompany,
    'formOptions' => ['id' => 'regFormStep3', 'data-url' => Url::toRoute("registration/step3save")],
    'content' => [
	'name' => [
	    'label' => 'Название компании *:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'MyRank'],
	],
	[
	    'phone' => [
		'label' => 'Номер телефона:',
		'type' => 'textInput',
		'options' => ['class' => 'input-text input-phone-company', 'placeholder' => '0 44 XXX XX XX'],
	    ],
	    'count_persons' => [
		'label' => 'Количество сотрудников:',
		'divClass' => 'select-wrapper',
		'type' => 'dropDownList',
		'options' => $mCompany->countPersonsList,
	    ]
	],
	[
	    'reg_date' => [
		'label' => 'Дата регистрации компании *:',
		'type' => 'textInput',
		'options' => ['class' => 'input-text', 'id' => 'regDate', 'placeholder' => '20.12.1986'],
	    ],
	    'cash' => [
		'label' => 'Годовой оборот:',
		'divClass' => 'select-wrapper',
		'type' => 'dropDownList',
		'options' => $mCompany->cashList,
	    ]
	],
	'director' => [
	    'label' => 'Директор:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'ФИО'],
	],
	'contact_face' => [
	    'label' => 'Контактное лицо:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'ФИО, должность'],
	],
	'about' => [
	    'label' => 'Информация о компании:',
	    'type' => 'textarea',
	    'options' => ['placeholder' => "Расскажите немного о компании"],
	    'posInfo' => 'Расскажите о компании. Не больше 500 символов.'
	],
	'user_id' => [
	    'label' => "",
	    'type' => "hiddenInput",
	    'options' => []
	]
    ],
    'success' => 'location.reload(true)',
    'script' => '$( function() {
		   $("#regDate").after("<input type=\"hidden\" id=\"regDateAlter\" name=\"Company[reg_date]\" />");
		   $("#regDateAlter").val($("#regDate").val());
		   $("#regDate").attr("name", "");
		   $("#regDate").datepicker({
			altField: "#regDateAlter",
			altFormat: "yy-mm-dd",
			dateFormat: "dd-mm-yy"
		   });
		 } );'
]);
