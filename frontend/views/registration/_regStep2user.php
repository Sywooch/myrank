<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<div class="b-modal">
    <?php
    $form = ActiveForm::begin([
		'options' => ['id' => 'regFormStep2']
    ]);
    ?>
    <input type="hidden" name="User[id]" value="<?= $model->id ?>" />
    <div class="b-modal__header">
	Регистрация - Шаг 2<span> из 2</span>
    </div>
    <div class="b-modal__content">
	<div class="row">
	    <div class="col-xs-12">
		<span>Место работы на данный момент</span>
		<?= $form->field($model, 'company_name')->textInput(['class' => 'input-text', 'placeholder' => 'ООО Астам'])->label(false) ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>Должность</span>
		<?= $form->field($model, 'company_post')->textInput(['class' => 'input-text', 'placeholder' => 'SEO'])->label(false) ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>Номер телефона</span>
		<?= $form->field($model, 'phone')->textInput(['class' => 'input-text input-phone'])->label(false) ?>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12">
		<span>Информация о себе</span>
		<?= $form->field($model, 'about')->textarea(['placeholder' => 'Расскажите немного о себе'])->label(false) ?>
		<i>Расскажите о себе. Не больше 500 символов.</i>
	    </div>
	</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-12" id="regFormStep2Error" style="display: none; color:red;"></div>
	</div>
	<div class="b-modal__content__buttons">
	    <div class="b-modal__content__buttons__item">
		<a id="regFormStep2Save" class="button-small" href="#">Сохранить</a>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a href="#">Пропустить</a></span>
	    </div>
	</div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $('.input-phone').inputmask('+38 ( 999 ) 999 - 99 - 99');
    $("#regFormStep2Save").on('click', function () {
	url = "<?= Url::toRoute("registration/step2save"); ?>";
	$.ajax({
	    url: url,
	    dataType: 'json',
	    data: $("#regFormStep2").serialize(),
	    method: 'POST',
	    success: function (out) {
		if (out.code == 1) {
		    document.location.href = out.link;
		} else {
		    view = "";
		    $.each(out.errors, function(i, val) {
			view += val[0] + "<br/>";
		    });
		    $("#regFormStep2Error").html(view).show('slow');
		}
	    }
	});
	return false;
    });
</script>
