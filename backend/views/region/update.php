<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Region */

$this->title = 'Обновить область: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Области', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->region_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="region-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
