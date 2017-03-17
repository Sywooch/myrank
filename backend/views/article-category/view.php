<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArticleCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории статей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['Обновить', 'id' => $model->id_article_category], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Удалить', 'id' => $model->id_article_category], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_article_category',
            'name',
        ],
    ]) ?>

</div>
