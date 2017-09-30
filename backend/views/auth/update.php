<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Auth1 */

$this->title = 'Обновить авторизации: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Авторизации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="auth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
