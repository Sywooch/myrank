<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-event-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'contr_act')->textInput() ?>
    <?= $form->field($model, 'rules')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
