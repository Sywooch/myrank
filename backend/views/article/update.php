<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = Yii::t('app','Обновить статью: ') . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_article]];
$this->params['breadcrumbs'][] = Yii::t('app','Обновить');
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
