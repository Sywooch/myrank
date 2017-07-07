<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserEvent */

$this->title = 'Добавить правило';
$this->params['breadcrumbs'][] = ['label' => 'SEO', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
