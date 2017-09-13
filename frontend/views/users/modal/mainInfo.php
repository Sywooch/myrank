<?php

use frontend\widgets\user\ModalWidget;
use yii\helpers\Url;

echo ModalWidget::widget([
    'title' => \Yii::t('app','PROFILE_EDIT'),
    'formOptions' => ['id' => 'editProfile', 'data-url' => Url::toRoute('users/savemaininfo')],
    'model' => $model,
    'content' => [
	'first_name' => [
	    'label' => \Yii::t('app','NAME').' *:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_FIRSTNAME')]
	],
	'last_name' => [
	    'label' => \Yii::t('app','SURNAME').' *:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_SURNAME')]
	],/*
	'email' => [
	    'label' => 'Email *:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'example@domain.com']
	],*/
	[
	    'country_id' => [
		'label' => \Yii::t('app','COUNTRY').':',
		'divClass' => 'select-wrapper country-select',
		'type' => 'dropDownList',
		'options' => $model->countries,
	    ],
	    'city_id' => [
		'label' => \Yii::t('app','CITY').':',
		'divClass' => 'select-wrapper city-select',
		'type' => 'dropDownList',
		'options' => isset($model->country_id) ? $model->getCityList($model->country_id) : [],
	    ],
	],
	'professionField' => [
	    'label' => \Yii::t('app','SPECIALIZATION').' *:',
	    'divClass' => 'select-wrapper specialization-select',
	    //'type' => 'dropDownList',
	    'type' => 'listBox',
	    'options' => $model->profList,
	    'posOpt' => ['multiple' => true],
	    'posInfo' => \Yii::t('app','LET_PEOPLE_KNOW_WHAT_YOU_ARE_DOING'),
	],
	'company_name' => [
	    'label' => \Yii::t('app','PLACE_OF_WORK_AT_THE_MOMENT'),
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_COMPANY_NAME')],
	],
	'company_post' => [
	    'label' => \Yii::t('app','POSITION'),
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_COMPANY_POST')],
	],
	'phone' => [
	    'label' => \Yii::t('app','PHONE_NUMBER'),
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text input-phone'],
	],
	'about' => [
	    'label' => \Yii::t('app','PERSONAL_INFORMATION'),
	    'type' => 'textarea',
	    'options' => ['placeholder' => \Yii::t('app','TELL_A_LITTLE_ABOUT_YOURSELF')]
	],/*
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
	]*/
    ],
    'success' => 'location.reload(true);',
    'script' => '$("#registration-country_id").on("change", function () {
	    id = $(this).val();
	    setCityList(id);
	});
	function setCityList (id) {
	    csrf = $("[name=\"csrf-token\"]").attr("content");
	    url = "'.Url::toRoute("users/getcities").'";
	    $.post(url, {"_csrf-frontend":csrf, "id":id}, function(data) {
		$("#registration-city_id").html(data);
	    });
	}
	//setCityList($("#user-country_id").val());
        
        $("#registration-company_name").autocomplete({
            source: function(request, response){
                    $.ajax({
                    url: "'.Url::toRoute(["registration/get-list-companies"]).'",
                    dataType: "json",
                    data:{
                        startsWith: request.term
                    },
                    success: function(data){
                        console.log(data);
                        response($.map(data.users, function(item){
                          return{
                            label: item.name,
                            value: item.name
                          }
                        }));
                    }
                    });
            },
            minLength: 2
        });
        jQuery.ui.autocomplete.prototype._resizeMenu = function () {
          var ul = this.menu.element;
          ul.outerWidth(this.element.outerWidth());
        }
	',
]);
?>