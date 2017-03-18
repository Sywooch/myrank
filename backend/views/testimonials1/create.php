<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Testimonials1 */

$this->title = 'Добавить отзывы';
$this->params['breadcrumbs'][] = ['label' => 'Отзывы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
