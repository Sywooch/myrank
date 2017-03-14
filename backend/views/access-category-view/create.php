<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AccessCategoryView */

$this->title = 'Добавить доступ к категориям просмотра';
$this->params['breadcrumbs'][] = ['label' => 'Доступ к категориям просмотра', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-category-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
