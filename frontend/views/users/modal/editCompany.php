<?php

use frontend\widgets\user\ModalWidget;
use yii\helpers\Url;

$lang = Yii::$app->language;

echo ModalWidget::widget([
    'title' => $title,
    'model' => $mCompany,
    'formOptions' => ['id' => 'editCompany', 'data-url' => Url::toRoute("users/editcompanysave")],
    'content' => [
	'name' => [
	    'label' => \Yii::t('app','COMPANY_NAME').' *:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => \Yii::t('app','EXAMPLE_COMPANY_NAME')],
	],
	[
	    'country_id' => [
		'label' => '* '.\Yii::t('app','COUNTRY').':',
		'divClass' => 'select-wrapper country-select',
		'type' => 'dropDownList',
		'options' => $model->countries,
	    ],
	    'city_id' => [
		'label' => '* '.\Yii::t('app','CITY').':',
		'divClass' => 'select-wrapper city-select',
		'type' => 'dropDownList',
		'options' =>  ($mCompany->city_id != 0) ? $model->getCityList($mCompany->country_id) : [],
	    ],
	],
	[
	    'phone' => [
		'label' => \Yii::t('app','PHONE_NUMBER').':',
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
		'label' => \Yii::t('app','DATE_OF_REGISTRATION_OF_THE_COMPANY').' *:',
		'type' => 'textInput',
		'options' => ['class' => 'input-text', 'id' => 'regDate', 'placeholder' => \Yii::t('app','EXAMPLE_DATE')],
	    ],
	    'cash' => [
		'label' => \Yii::t('app','ANNUAL_TURNOVER').':',
		'divClass' => 'select-wrapper',
		'type' => 'dropDownList',
		'options' => $mCompany->cashList[$lang],
                'posOpt' => ['prompt' => " "]
	    ]
	],
	'professionField' => [
	    'label' => '* '.\Yii::t('app','SPECIALIZATION').':',
	    'divClass' => 'select-wrapper specialization-select',
	    'type' => 'dropDownList',
	    'options' => $model->profList,
	    'posOpt' => ['multiple' => true],
	    'posInfo' => \Yii::t('app','LET_PEOPLE_KNOW_WHAT_YOU_ARE_DOING'),
	],
        'main_prof' => [
            'label' => Yii::t('app', 'MAIN_PROFESSION'),
            'divClass' => 'select-wrapper',
            'type' => 'dropDownList',
            'options' => $mainProfList,
            'posOpt' => ['prompt' => " "]
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
        [
            'hide_testimonials' => [
		'label' => '',
		'type' => 'dropDownList',
		'options' => ['Включить отзывы', 'Отключить отзывы'],
	    ],
	    'hide_marks' => [
		'label' => '',
		'type' => 'dropDownList',
                'options' => ['Включить оценки', 'Отключить оценки']
	    ]
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
                        dateFormat: "dd-mm-yy",
                        changeMonth: true,
                        changeYear: true,
                        maxDate: "+0d"
                    });
		});
		 
		$("#company-country_id").on("change", function () {
		    setCityList($(this).val());
		});
                
                $(".modal").on("shown.bs.modal", function () {
                    $(".specialization-select select").select2({
                        placeholder: "'.\Yii::t('app','SPECIALIZATION').'",
                        maximumSelectionLength: 10,
                        language: {
                            // You can find all of the options in the language files provided in the
                            // build. They all must be functions that return the string that should be
                            // displayed.
                            maximumSelected: function (e) {
                                //var t = "You can only select " + e.maximum + " item111";
                                //e.maximum != 1 && (t += "s");
                                return "'.Yii::t('app', 'SELECT2_MAX_LENGTH_MESSAGE').'";
                            }
                        }
                    });
                });
		
		$(".specialization-select select").on("select2:select", function (e) {
                    var data = e.params.data;
                    $("#company-main_prof").append($("<option></option>").attr("value", data.id).text(data.text));
                    //console.log(data);
                });
                
		$(".specialization-select select").on("select2:unselect", function (e) {
                    var data = e.params.data;
                    $("#company-main_prof").find("[value=\'" + data.id + "\']").remove();
                    //console.log(data);
                });
                


		function setCityList (id) {
		    csrf = $("[name=\"csrf-token\"]").attr("content");
		    url = "'.Url::toRoute("users/getcities").'";
		    $.post(url, {"_csrf-frontend":csrf, "id":id}, function(data) {
			$("#company-city_id").html(data);
		    });
		}
		'
]);