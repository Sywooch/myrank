<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->checkbox(); ?>

    <?php /*echo $form->field($model, 'content')->textarea(['rows' => 6])*/
        echo $form->field($model, 'content')->widget(Widget::className(), [
            'settings' => [
                //'selector' => 'staticpages-content',
                //'imageUpload' => Url::to(['/images/images-upload']),
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'imagemanager',
                ]
            ]
        ]);
    ?>

    <?= $form->field($model, 'title_browser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?php /*echo $form->field($model, 'create_time')->textInput() */ ?>

    <?php /*echo $form->field($model, 'update_time')->textInput() */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
