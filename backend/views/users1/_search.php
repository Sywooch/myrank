<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Users1Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?php /*echo $form->field($model, 'account_id') */?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'company_post') ?>

    <?= $form->field($model, 'profileviews') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?= $form->field($model, 'about') ?>

    <?= $form->field($model, 'last_login') ?>

    <?= $form->field($model, 'rating') ?>

    <?= $form->field($model, 'birthdate') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'mark') ?>

    <?php // echo $form->field($model, 'marks_config') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
