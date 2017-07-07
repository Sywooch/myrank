<?php
// use frontend\widgets\article\ArticleLastIssuesWidget;
// use yii\helpers\Html;
use yii\helpers\Url;
// $itemView, $model, $key, $index, $widget
?>

<div class="b-articles__item">
    <div class="b-articles__item__image">
        <a href="<?= Url::to(['article/view', 'id' => $model->id_article]); ?>"><img src="<?= $model->header_image_small_square ?>" alt=""></a>
    </div>
    <div class="b-articles__item__content">
        <div class="b-articles__item__title">
            <a href="<?= Url::to(['article/view', 'id' => $model->id_article]); ?>"><?= $model->title ?></a>
        </div>
        <div class="b-articles__item__text">
            <?= $model->abridgment ?>
        </div>
        <div class="b-articles__item__tags">
            <a href="<?= Url::to(['article/cat-index', 'category' => $model->article_category_id]); ?>"><?= $model->articleCategoryName ?></a>
        </div>
    </div>
</div>