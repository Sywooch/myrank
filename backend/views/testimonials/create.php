<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Testimonials */

$this->title = Yii::t('app', 'Create Testimonials');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Testimonials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
