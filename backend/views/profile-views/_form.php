<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProfileViews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-views-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lastweek')->textInput() ?>

    <?= $form->field($model, 'lastmonth')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
