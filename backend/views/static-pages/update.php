<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */

$this->title = Yii::t('app', 'Обновить статические страницы: ', [
    'modelClass' => 'Static Pages',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статические страницы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="static-pages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
