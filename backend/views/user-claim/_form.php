<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserClaim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-claim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'obj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obj_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновиьт', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
