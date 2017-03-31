<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ArticleCategory */

$this->title = Yii::t('app','Добавить категорию статей');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Категории статей'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
