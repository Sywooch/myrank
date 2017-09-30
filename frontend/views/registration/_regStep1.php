<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => \Yii::t('app', 'REGISTRATION_STEP_1_OF_2'),
    'model' => $model,
    'formOptions' => ['id' => 'regFormStep1', 'data-url' => Url::toRoute("registration/step1save")],
    'message' => \Yii::t('app', 'CHECK_CORRECTNESS_OF_THE_DATA_FILLING_FILL_IN_THE_MISSING_INFORMATION'),
    'content' => [
        'first_name' => [
            'label' => '* ' . \Yii::t('app', 'NAME'),
            'type' => 'textInput',
            'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app', 'EXAMPLE_FIRSTNAME')]
        ],
        'last_name' => [
            'label' => '* ' . \Yii::t('app', 'SURNAME'),
            'type' => 'textInput',
            'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app', 'EXAMPLE_SURNAME')]
        ],
        'email' => [
            'label' => '* Email',
            'type' => 'textInput',
            'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app', 'EXAMPLE_EMAIL')]
        ],
        [
            'country_id' => [
                'label' => '* ' . \Yii::t('app', 'COUNTRY') . ':',
                'divClass' => 'select-wrapper country-select',
                'type' => 'dropDownList',
                'options' => $model->countries,
            ],
            'city_id' => [
                'label' => '* ' . \Yii::t('app', 'CITY') . ':',
                'divClass' => 'select-wrapper city-select',
                'type' => 'dropDownList',
                'options' => []//$model->cityList,
            ],
        ],
        'professionField' => [
            'label' => '* ' . \Yii::t('app', 'SPECIALIZATION') . ':',
            'divClass' => 'select-wrapper specialization-select',
            'type' => 'dropDownList',
            'options' => $model->profList,
            'posOpt' => ['multiple' => true],
            'posInfo' => \Yii::t('app', 'LET_PEOPLE_KNOW_WHAT_YOU_ARE_DOING'),
        ],
        [
            'password' => [
                'label' => '* ' . \Yii::t('app', 'PASSWORD') . ':',
                'type' => 'passwordInput',
                'options' => ['class' => 'input-text']
            ],
            'rePassword' => [
                'label' => '* ' . \Yii::t('app', 'CONFIRM_PASSWORD') . ':',
                'type' => 'passwordInput',
                'options' => ['class' => 'input-text'],
            ]
        ],
        'legal' => [
            'label' => '',
            'type' => 'checkbox',
            'options' => [
                'label' => Html::a(\Yii::t('app', 'ACCEPT_LEGAL'), Url::to(['static-pages/legalinfo']), ['target' => '_blank']),
            ],
            'posOpt' => true
        ],
        'type' => [
            'label' => 'Type',
            'type' => 'hiddenInput',
            'options' => []
        ]
    ],
    'success' => '$("#modalView .modal-content").html(out.data);',
    'script' => '
        $("#formButtons").hide();
        
        $("#regstep1-legal").on("click", function () {
            $("#formButtons").toggle("slow");
        });
        
	$(".country-select select").select2({
	    placeholder: "' . \Yii::t('app', 'COUNTRY') . '"
	});
	$(".city-select select").select2({
	    placeholder: "' . \Yii::t('app', 'CITY') . '"
	});
	$(".specialization-select select").select2({
	    placeholder: "' . \Yii::t('app', 'SPECIALIZATION') . '"
	});
	$("#regstep1-country_id").on("change", function () {
	    setCityList($(this).val());
	});
	
	function setCityList (id) {
	    csrf = $("[name=\"csrf-token\"]").attr("content");
	    url = "' . Url::toRoute("users/getcities") . '";
	    $.post(url, {"_csrf-frontend":csrf, "id":id}, function(data) {
		$("#regstep1-city_id").html(data);
	    });
	}
	setCityList($("#regstep1-country_id").val());
	',
]);
?>