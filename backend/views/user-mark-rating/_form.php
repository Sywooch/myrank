<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserMarkRating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-mark-rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_from')->textInput() ?>

    <?= $form->field($model, 'user_to')->textInput() ?>

    <?= $form->field($model, 'mark_id')->textInput() ?>

    <?= $form->field($model, 'mark_val')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
