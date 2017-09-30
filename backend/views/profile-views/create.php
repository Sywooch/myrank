<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ProfileViews */

$this->title = 'Создать просмотры профиля';
$this->params['breadcrumbs'][] = ['label' => 'Просмотры профиля', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-views-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
