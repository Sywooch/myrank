<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>


<div class="b-modal">
    <div class="b-modal__header"><?= Yii::t('app', 'REQUEST_PASSWORD_RESET') ?></div>
    <div class="b-modal__content">
	<div class="row">
	    <div class="col-lg-5">
		<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

		<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

		<div class="form-group">
		    <?= Html::submitButton(Yii::t('app', 'SEND'), ['class' => 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	    </div>
	</div>
    </div>
</div>