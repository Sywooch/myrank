<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>


<div class="b-modal">
    <div class="b-modal__header"><?= Yii::t('app', 'REQUEST_PASSWORD_RESET') ?></div>
    <div class="b-modal__content">
	<div class="row">
	    <div class="col-lg-5">
		<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

		<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

		<div class="form-group">
		    <?= Html::button(Yii::t('app', 'SEND'), ['class' => 'btn btn-primary', 'id' => 'saveReset']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	    </div>
	</div>
    </div>
</div>

<script type="text/javascript">
    $("#saveReset").on('click', function() {
	url = '<?= Url::toRoute(['site/requestpasswordreset']) ?>';
	$.ajax({
	    url: url,
	    dataType: 'json',
	    method: 'POST',
	    data: $("#request-password-reset-form").serialize(),
	    success: function (out) {
		if(out.code == 1) {
		    location.reload(true);
		}
	    }
	});
	return false;
    });
</script>