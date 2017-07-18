<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Testimonials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testimonials-form">

    <?php $form = ActiveForm::begin(); ?>
    <table style="font-size: 20px;">
        <tr>
            <td>От: </td>
            <td><?= Html::a($model->userFrom->fullName, ['users/view', 'id' => $model->userFrom->id]) ?></td>
        </tr>
        <tr>
            <td>Кому: </td>
            <td><?= Html::a($model->userTo->fullName, ['users/view', 'id' => $model->userTo->id]) ?></td>
        </tr>
    </table>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
