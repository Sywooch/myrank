<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'RESET_PASSWORD');
?>
<div class="site-reset-password">
    <h1><?= $this->title ?></h1>

    <p><?= Yii::t('app', 'PLEASE_CHOOSE_YOUR_NEW_PASSWORD') ?>:</p>
    <div style="text-align: center">
	<div class="row">
	    <div class="col-lg-5">

		<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

		<?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
		    <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-primary']) ?>
                </div>

		<?php ActiveForm::end(); ?>
	    </div>
        </div>
    </div>
</div>
