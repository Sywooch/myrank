<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\GeoCountry */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Geo Country',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Geo Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="geo-country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
