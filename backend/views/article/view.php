<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_article], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_article], [
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
            'id_article',
            'title',
            'abridgment',
            'content:ntext',
            'header_title',
            'header_image',
            'article_category_id',
            'status',
            'views',
            'create_time',
            'update_time',
            'header_image',
            'header_image_small',
            'header_image_small_square',
        ],
    ]) ?>

</div>

<div class="b-article__header__image"><p>'header_image'</p>
    <img src="<?= Html::encode($model->header_image) ?>" alt="">
</div>
<br>
<div class="b-article__header__image"><p>'header_image_small'</p>
    <img src="<?= Html::encode($model->header_image_small) ?>" alt="">
</div>
<br>
<div class="b-article__header__image"><p>'header_image_small_square'</p>
    <img src="<?= Html::encode($model->header_image_small_square) ?>" alt="">
</div>
