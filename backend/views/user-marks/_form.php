<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserMarks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-marks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_to')->textInput() ?>

    <?= $form->field($model, 'user_from')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
