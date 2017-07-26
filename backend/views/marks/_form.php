<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Marks;
use kartik\select2\Select2;
use backend\models\User;
use yii\helpers\Url;

$parent = $model->getList();
$data = [1 => 'red', 2 => 'green'];
?>

<div class="marks-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?></div>
    </div>

    <?= $form->field($model, 'type')->dropDownList(User::$typeUser) ?>
    <?= $form->field($model, 'parent_id')->dropDownList($model->isNewRecord ? [] : $model->getList(0, $model->type)) ?>
    <div class="row">
        <div class="col-md-4"><?= $form->field($model, 'configure')->checkbox() ?></div>
        <div class="col-md-4"><?= $form->field($model, 'required')->checkbox() ?></div>
        <div class="col-md-4"><?= $form->field($model, 'prof_only')->checkbox() ?></div>
    </div>

    <?=
    $form->field($model, 'profsField')->widget(Select2::classname(), [
        'data' => $model->professions,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
<?php
$url = Url::toRoute(['marks/getparents']);
$script = $model->isNewRecord ? "changeType();" : "";
$script .= "$(document).on('change', '#marks-type', function () {
        changeType();
    });
    
    function changeType () {
        id = $('#marks-type').val();
        $.get('$url', {type:id}, function (out) {
            $('#marks-parent_id').html(out);
        });
    }";
$this->registerJs($script, yii\web\View::POS_END);
?>
