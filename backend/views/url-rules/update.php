<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserEvent */

$this->title = 'Редактировать';
$this->params['breadcrumbs'][] = ['label' => 'Правила ссылкок', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Правило', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="user-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
