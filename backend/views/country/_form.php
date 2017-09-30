<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'countryCode')->textInput(['maxlength' => true]) ?>

    <div class="panel-group" id="accordion">
        <?php foreach (Yii::$app->params['lang'] as $key => $item) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?=
                        Html::a($item, "#collapse$key", [
                            'data-toggle' => 'collapse',
                            'data-parent' => '#accordion'
                        ])
                        ?>
                    </h4>
                </div>
                <div id="collapse<?= $key ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-group">
                            <?=
                            Html::textInput("Country[geoCountries][$key][name]", isset($geoC[$key]) ? $geoC[$key]['name'] : NULL, [
                                'placeholder' => 'Название',
                                'class' => 'form-control'
                            ])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
