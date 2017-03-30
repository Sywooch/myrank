<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = Yii::t('app','Добавить статью');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
