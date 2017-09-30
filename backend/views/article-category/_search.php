<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticleCategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_article_category') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'locale') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Найти'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app','Сбросить'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
