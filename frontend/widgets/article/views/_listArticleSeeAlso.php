<?php
// use frontend\widgets\article\ArticleLastIssuesWidget;
// use yii\helpers\Html;
use yii\helpers\Url;
// $itemView, $model, $key, $index, $widget
?>

<div class="col-xs-12 col-sm-6">
    <div class="b-articles__item b-articles__item_large">
        <div class="b-articles__item__image">
            <a href="<?= Url::to(['article/view', 'id' => $model->id_article]); ?>"><img src="<?= $model->header_image_small ?>" alt=""></a>
        </div>
        <div class="b-articles__item__content">
            <div class="b-articles__item__title">
                <a href="<?= Url::to(['article/view', 'id' => $model->id_article]); ?>"><?= $model->title ?></a>
            </div>
            <div class="b-articles__item__text">
                <?= $model->abridgment ?>
            </div>
            <div class="b-articles__item__tags">
                <a href="<?= Url::to(['article/index', 'category' => $model->article_category_id]); ?>"><?= $model->articleCategory->name ?></a>
            </div>
        </div>
    </div>
</div>