<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */

if (empty($model->title_browser)) {
    $this->title = $model->title;
} else {
    $this->title = $model->title_browser;
}
if (!empty($model->meta_description)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_description), 'name' => 'description']);
}
if (!empty($model->meta_keywords)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_keywords), 'name' => 'keywords']);
}

$this->params['breadcrumbs'] = [
    ['label' => $this->title, 'url' => [$model->alias]],
];
?>
<div class="container">
    <!-- <div class="page-header">-->
    <p></p>
    <h2><?= Html::encode($model->title); ?></h2>
    <!--</div>-->
    <!--<div class="clearfix"></div>-->
    <?= $model->content; ?>

    <div class="row">
        <div class="col-lg-12"><h2>Как мы можем вам помочь</h2></div>
        
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'help-form']); ?>
            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($mHelp, 'name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-lg-6">
                <?= $form->field($mHelp, 'email') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($mHelp, 'problem')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($mHelp, 'problemTypeVal')->dropDownList($mHelp->problemType()) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">Расскажите нам подробнее</div>
                <div class="col-lg-12">
                    <?= $form->field($mHelp, 'question')->textarea(['rows' => 6]) ?>
                </div>
            </div>
                <?php /* $form->field($mCont, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) */ ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'SUBMIT'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
