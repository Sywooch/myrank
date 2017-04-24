<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\models\Testimonials;
use yii\helpers\Html;
?>

<div class="b-modal">
    <?php
    $form = ActiveForm::begin([
		'options' => ["id" => "testimonialsForm"],
		'fieldConfig' => [
		    'options' => [
			'tag' => false,
		    ],
		]
    ]);
    ?>
    <div class="b-modal__header">
	Оставить отзыв
    </div>
    <div class="b-modal__content">
	<div class="b-modal__content__user">
	    <div class="b-modal__content__user__header">
		<div class="b-modal__content__user__header__image">
		    <img src="<?= $mUser->userImage ?>" alt="">
		</div>
		<div class="b-modal__content__user__header__info">
		    <div class="b-modal__content__user__header__info__radio b-modal__content__user__header__info__radio_positive">
			<input value="<?= Testimonials::SMILE_CLASS_POSITIVE ?>" 
			       type="radio" 
			       id="modal-radio1" 
			       name="Testimonials[smile]"
			       <?= $model->smile == Testimonials::SMILE_CLASS_POSITIVE ? "checked" : "" ?> />
			<label for="modal-radio1"><span></span></label>
		    </div>
		    <div class="b-modal__content__user__header__info__radio b-modal__content__user__header__info__radio_neutral">
			<input value="<?= Testimonials::SMILE_CLASS_NEUTRAL ?>" 
			       type="radio" 
			       id="modal-radio2" 
			       name="Testimonials[smile]"
			       <?= $model->smile == Testimonials::SMILE_CLASS_NEUTRAL ? "checked" : "" ?> />
			<label for="modal-radio2"><span></span></label>
		    </div>
		    <div class="b-modal__content__user__header__info__radio b-modal__content__user__header__info__radio_negative">
			<input value="<?= Testimonials::SMILE_CLASS_NEGATIVE ?>" 
			       type="radio" 
			       id="modal-radio3" 
			       name="Testimonials[smile]"
			       <?= $model->smile == Testimonials::SMILE_CLASS_NEGATIVE ? "checked" : "" ?> />
			<label for="modal-radio3"><span></span></label>
		    </div>
		</div>
		<div class="b-modal__content__user__header__content">
		    <div class="b-modal__content__user__header__content__title"><?= $mUser->fullName ?></div>
		    <div class="b-modal__content__user__header__content__select">
			<span>Я:</span>
			<div class="select-wrapper">
			    <?= $form->field($model, "who_from_to")->dropDownList(Testimonials::$whoFromTo)->label(false) ?>
			</div>
		    </div>
		</div>
	    </div>
	    <div class="b-modal__content__user__content">
		<!-- div class="b-modal__content__user__content__item" >
		    <div class="b-modal__content__user__content__title">
			Отличный работник!
		    </div>
		    <div class="b-modal__content__user__content__name">
			Борис Годунов
		    </div>
		    <div class="b-modal__content__user__content__post">
			Рекрутер
		    </div>
		    <div class="b-modal__content__user__content__text">
			<p>
			    Далеко-далеко за словесными горами в
			    стране гласных и согласных живут рыбные
			    тексты.
			</p>
		    </div>
		</div -->
		<div class="row">
		    <div class="col-xs-12">
			<span>Текст отзыва</span>
			<?= $form->field($model, 'text')->textarea(['placeholder' => "Напишите несколько слов"])->label(FALSE); ?>
			<!-- textarea name="Testimonials[text]" placeholder="Напишите несколько слов"></textarea -->
			<i>Не больше 500 символов.</i>
		    </div>
		</div>
		<div class="row">
		    <div class="col-xs-12">
			<div id="errorBlock" style="color:#ff0000; display: none;"></div>
		    </div>
		</div>
	    </div>
	</div>
	<div class="b-modal__content__buttons">
	    <div class="b-modal__content__buttons__item">
		<a id="saveTestimonials" class="button-small" href="#">Сохранить</a>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a id="cancelBut" href="#">Отмена</a></span>
	    </div>
	</div>
    </div>
    <input type="hidden" name="Testimonials[user_from]" value="<?= $mUser->id ?>" />
    <input type="hidden" name="Testimonials[user_to]" value="<?= $user_to ?>" />
    <input type="hidden" name="Testimonials[parent_id]" value="<?= $parent ?>" />
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $("#cancelBut").on('click', function () {
	$('#modalView').modal('hide');
	return false;
    });
    $("#saveTestimonials").on("click", function () {
	var url = "<?= Url::toRoute(['users/savetestimonials']) ?>";
	$.ajax({
	    url: url,
	    dataType: "json",
	    method: "POST",
	    data: $("#testimonialsForm").serialize(),
	    success: function (out) {
		if (out.code == 1) {
		    $("#modalView").modal('toggle');
		    //alertInfo("Ваш отзыв отправлен на модерацию");
		    location.reload(true);
		} else {
		    view = "";
		    $.each(out.errors, function (i, val) {
			view += val[0] + "<br/>";
		    });
		    $("#errorBlock").html(view).show("slow");
		}
	    }
	});
	return false;
    });
</script>
