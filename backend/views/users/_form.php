<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $model->isNewRecord ? $form->field($model, 'type')->dropDownList(\frontend\models\User::$typeUser) : NULL ?>
    <?= $form->field($model, 'about')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'birthdate')->textInput() ?>
    <?= $form->field($model, 'gender')->dropDownList($model->genderUser) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(); ?>
    <?= $form->field($model, 'rePassword')->passwordInput(); ?>

    <div class="form-group">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
