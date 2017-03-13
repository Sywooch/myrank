<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Country */

$this->title = 'Обновить страну: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Страны', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
