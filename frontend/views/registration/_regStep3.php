<?php

use frontend\widgets\user\ModalWidget;
use yii\helpers\Url;

echo ModalWidget::widget([
    'title' => $title,
    'model' => $mCompany,
    'formOptions' => ['id' => 'regFormStep3', 'data-url' => Url::toRoute("registration/step3save")],
    'content' => [
	'name' => [
	    'label' => \Yii::t('app','COMPANY_NAME').'* :',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_COMPANY_NAME')],
	],
	[
	    'phone' => [
		'label' => \Yii::t('app','PHONE_NUMBER').'* :',
		'type' => 'textInput',
		'options' => ['class' => 'input-text input-phone-company', 'placeholder' => \Yii::t('app','EXAMPLE_PHONE')],
	    ],
	    'count_persons' => [
		'label' => \Yii::t('app','THE_NUMBER_OF_EMPLOYEES').':',
		'divClass' => 'select-wrapper',
		'type' => 'dropDownList',
		'options' => $mCompany->countPersonsList,
	    ]
	],
	[
	    'reg_date' => [
		'label' => \Yii::t('app','DATE_OF_REGISTRATION_OF_THE_COMPANY').'* :',
		'type' => 'textInput',
		'options' => ['class' => 'input-text', 'id' => 'regDate', 'placeholder' => \Yii::t('app','EXAMPLE_DATE')],
	    ],
	    'cash' => [
		'label' => \Yii::t('app','ANNUAL_TURNOVER').':',
		'divClass' => 'select-wrapper',
		'type' => 'dropDownList',
		'options' => $mCompany->cashList,
	    ]
	],
	'director' => [
	    'label' => \Yii::t('app','DIRECTOR').':',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_DIRECTOR')],
	],
	'contact_face' => [
	    'label' => \Yii::t('app','CONTACT_PERSON').':',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_CONTACT_PERSON')],
	],
	'about' => [
	    'label' => \Yii::t('app','INFORMATION_ABOUT_THE_COMPANY').':',
	    'type' => 'textarea',
	    'options' => ['placeholder' => \Yii::t('app','TELL_A_LITTLE_ABOUT_COMPANY')],
	    'posInfo' => \Yii::t('app','TELL_US_ABOUT_COMPANY_NO_MORE_THAN_500_CHARACTERS')
	],
	'user_id' => [
	    'label' => "",
	    'type' => "hiddenInput",
	    'options' => []
	],
        'city_id' => [
            'label' => "",
            'type' => 'hiddenInput',
            'options' => [],
        ],
    ],
    'success' => 'location.reload(true)',
    'script' => '$( function() {
		   $("#regDate").after("<input type=\"hidden\" id=\"regDateAlter\" name=\"Company[reg_date]\" />");
		   $("#regDateAlter").val($("#regDate").val());
		   $("#regDate").attr("name", "");
		   $("#regDate").datepicker({
			altField: "#regDateAlter",
			altFormat: "yy-mm-dd",
			dateFormat: "dd-mm-yy",
                        changeMonth: true,
                        changeYear: true
		   });
		 } );'
]);
