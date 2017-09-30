<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Testimonials */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Testimonials',
]); // . $model->title;
?>
<div class="testimonials-update">
    <a onclick="history.back(); return false;" href="#">Вернуться назад</a>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
