<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profession */
/* @var $form yii\widgets\ActiveForm */
$typeUser = User::$typeUser;
$typeUser[50] = 'Для всех';
unset($typeUser[User::TYPE_USER_ADMIN]);
?>

<div class="profession-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'user_type')->dropDownList($typeUser) ?>
    <?= $form->field($model, 'hide_main_page')->checkbox() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
