<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_article') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'abridgment') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'header_title') ?>

    <?= $form->field($model, 'header_image') ?>

    <?php  echo $form->field($model, 'header_image_small') ?>

    <?php  echo $form->field($model, 'header_image_small_square') ?>

    <?php  echo $form->field($model, 'article_category_id') ?>

    <?php  echo $form->field($model, 'status') ?>

    <?php  echo $form->field($model, 'views') ?>

    <?php  echo $form->field($model, 'create_time') ?>

    <?php  echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
