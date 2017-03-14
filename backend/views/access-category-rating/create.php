<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AccessCategoryRating */

$this->title = 'Добавить доступ к категориям рейтинга';
$this->params['breadcrumbs'][] = ['label' => 'Доступ к категориям рейтинга', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-category-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
