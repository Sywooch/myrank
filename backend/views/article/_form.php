<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abridgment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'header_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_image_small')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'header_image_small_square')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article_category_id')->textInput() ?>

    <?php /*echo $form->field($model, 'status')->checkbox(); */
        echo $form->field($model, 'status')->dropDownList($model->getItemAlias('status', null, null));
    ?>

    <?= $form->field($model, 'locale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?php /* echo $form->field($model, 'create_time')->textInput() */?>

    <?php /* echo $form->field($model, 'update_time')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Создать') : Yii::t('app','Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
