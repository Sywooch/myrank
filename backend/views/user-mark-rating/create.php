<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UserMarkRating */

$this->title = 'Добавить пользовательские рейтинги самооценок';
$this->params['breadcrumbs'][] = ['label' => 'Пользовательские рейтинги самооценок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-mark-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
