<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => \Yii::t('app','REGISTRATION_STEP_2_OF_2'),
    'model' => $model,
    'formOptions' => ['id' => 'regFormStep2'],
    'content' => [
	'id' => [
	    'label' => "",
	    'type' => 'hiddenInput',
	    'options' => ['value' => $model->id]
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
	    'options' => ['placeholder' => \Yii::t('app','TELL_A_LITTLE_ABOUT_YOURSELF')],
	    'posInfo' => \Yii::t('app','TELL_US_ABOUT_YOURSELF_NO_MORE_THAN_500_CHARACTERS')
	]
    ],
    'success' => "document.location.href = out.link;",
    'script' => "$('.input-phone').inputmask('+38 ( 999 ) 999 - 99 - 99');",
]);
?>