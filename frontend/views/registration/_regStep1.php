<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\widgets\user\ModalWidget;


echo ModalWidget::widget([
    'title' => 'Регистрация - Шаг 1<span> из 2</span>',
    'model' => $model,
    'formOptions' => ['id' => 'regFormStep1', 'data-url' => Url::toRoute("registration/step1save")],
    'content' => [
	'first_name' => [
	    'label' => '* Имя',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'David']
	],
	'last_name' => [
	    'label' => '* Фамилия',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'Dox']
	],
	'email' => [
	    'label' => '* Email',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text', 'placeholder' => 'example@domain.com']
	],
	[
	    'country_id' => [
		'label' => '* Страна:',
		'divClass' => 'select-wrapper country-select',
		'type' => 'dropDownList',
		'options' => $model->countries,
	    ],
	    'city_id' => [
		'label' => '* Город:',
		'divClass' => 'select-wrapper city-select',
		'type' => 'dropDownList',
		'options' => $model->cityList,
	    ],
	],
	'profession' => [
	    'label' => '* Специализация:',
	    'divClass' => 'select-wrapper specialization-select',
	    'type' => 'dropDownList',
	    'options' => $model->profList,
	    'posOpt' => ['multiple' => true],
	    'posInfo' => "Позвольте людям узнать чем вы занимаетесь",
	],
	[
	    'password' => [
		'label' => '* Пароль:',
		'type' => 'passwordInput',
		'options' => ['class' => 'input-text']
	    ],
	    'rePassword' => [
		'label' => '* Повторите пароль:',
		'type' => 'passwordInput',
		'options' => ['class' => 'input-text'],
	    ]
	]
    ],
    'success' => '$("#modalView .modal-content").html(out.data);',
    'script' => '    $(".specialization-select select").select2({
	    placeholder: "Специализация"
	});
	$(".country-select select").select2({
	    placeholder: "Страна"
	});
	$(".city-select select").select2({
	    placeholder: "Город"
	});
	$("#user-country_id").on("change", function () {
	    csrf = $("[name=\"csrf-token\"]").attr("content");
	    url = "'.Url::toRoute("users/getcities").'";
	    $.post(url, {"_csrf-frontend":csrf, "id":$(this).val()}, function(data) {
		$("#user-city_id").html(data);
	    });
	});
	',
]);
/*
?>
<div class="b-modal">
    <?php
    $form = ActiveForm::begin([
		'options' => ['id' => 'regFormStep1']
    ]);
    ?>
    <div class="b-modal__header">
	Регистрация - Шаг 1<span> из 2</span>
    </div>
    <div class="b-modal__content">
	<div class="row">
	    <div class="col-xs-12">
		<span>* Имя:</span>
		<?= $form->field($model, 'first_name')->textInput(['class' => 'input-text', 'placeholder' => 'David'])->label(FALSE); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>* Фамилия:</span>
		<?= $form->field($model, 'last_name')->textInput(['class' => 'input-text', 'placeholder' => 'Dox'])->label(FALSE); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>* Email:</span>
		<?= $form->field($model, 'email')->textInput(['class' => 'input-text', 'placeholder' => 'example@domain.name'])->label(FALSE); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-6">
		<span>* Страна:</span>
		<div class="select-wrapper country-select">
		    <?= $form->field($model, 'country_id')->dropDownList(['Россия'])->label(FALSE); ?>
		</div>
	    </div>
	    <div class="col-xs-12 col-sm-6">
		<span>* Город:</span>
		<div class="select-wrapper city-select">
		    <?= $form->field($model, 'city_id')->dropDownList($model->cityList)->label(FALSE); ?>
		</div>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>* Специализация:</span>
		<div class="select-wrapper specialization-select">
		    <?= $form->field($model, 'profession')->dropDownList($model->profList, ['multiple' => true])->label(FALSE); ?>
		</div>
		<i>Позвольте людям узнать чем вы занимаетесь</i>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-6">
		<span>* Пароль:</span>
		<?= $form->field($model, 'password')->passwordInput(['class' => 'input-text'])->label(FALSE); ?>
	    </div>
	    <div class="col-xs-12 col-sm-6">
		<span>* Повторите пароль:</span>
		<?= $form->field($model, 'rePassword')->passwordInput(['class' => 'input-text'])->label(FALSE); ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-12" id="regFormStep1Error" style="display: none; color:red;"></div>
	</div>
	<div class="b-modal__content__buttons">
	    <div class="b-modal__content__buttons__item">
		<a id="regFormStep1Save" class="button-small" href="#">Сохранить</a>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a href="#">Отменить</a></span>
	    </div>
	</div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $("#regFormStep1Save").on('click', function () {
	url = "<?= Url::toRoute("registration/step1save"); ?>";
	csrf = "<?= Yii::$app->request->getCsrfToken(); ?>";
	$.ajax({
	    url: url,
	    dataType: 'json',
	    data: $("#regFormStep1").serialize(),
	    method: 'POST',
	    success: function (out) {
		if (out.code == 1) {
		    $("#modalView .modal-content").html(out.data);
		} else {
		    view = "";
		    $.each(out.errors, function(i, val) {
			view += val[0] + "<br/>";
		    });
		    $("#regFormStep1Error").html(view).show('slow');
		}
	    }
	});
	return false;
    });

    $(".specialization-select select").select2({
	placeholder: "Специализация"
    });
    $(".country-select select").select2({
	placeholder: "Страна"
    });
    $(".city-select select").select2({
	placeholder: "Город"
    });
</script> */ ?>