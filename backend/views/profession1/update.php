<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profession1 */

$this->title = 'Обновить направление профессии: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Направления профессий', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="profession1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
