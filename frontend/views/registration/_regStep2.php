<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => 'Регистрация - Шаг 2<span> из 2</span>',
    'model' => $model,
    'formOptions' => ['id' => 'regFormStep2'],
    'content' => [
	'id' => [
	    'label' => "",
	    'type' => 'hiddenInput',
	    'options' => ['value' => $model->id]
	],
	'company_name' => [
	    'label' => 'Место работы на данный момент',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'ООО Астам'],
	],
	'company_post' => [
	    'label' => 'Должность',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'SEO'],
	],
	'phone' => [
	    'label' => 'Номер телефона',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text input-phone'],
	],
	'about' => [
	    'label' => 'Информация о себе',
	    'type' => 'textarea',
	    'options' => ['placeholder' => 'Расскажите немного о себе'],
	    'posInfo' => 'Расскажите о себе. Не больше 500 символов.'
	]
    ],
    'success' => "document.location.href = out.link;",
    'script' => "$('.input-phone').inputmask('+38 ( 999 ) 999 - 99 - 99');",
]);
?>