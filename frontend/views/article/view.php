<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\widgets\article\ArticleLastIssuesWidget;
use frontend\widgets\article\ArticleSeeAlsoWidget;

$this->title = $model->title;
$this->params['breadcrumbs'] = [
    ['label' => \Yii::t('app','ARTICLES'), 'url' => ['index']],
    ['label' => $this->title, 'url' => ['article/view', 'id' => $model->id_article]]
];
?>

<div class="container">
    <div id="main">
        <div class="b-content">
            <div class="b-article b-block">
                <div class="b-title">
                    <h1><?= Html::encode($model->title) ?></h1>
                </div>
                <div class="b-article__header">
                    <div class="b-article__header__title">
                        <span><?= Html::encode($model->header_title) ?></span>
                    </div>
                    <div class="b-article__header__image">
                        <img src="<?= Html::encode($model->header_image) ?>" alt="">
                    </div>
                    <div class="b-article__header__info">
                        <div class="b-articles__item__tags">
                            <a href="<?= Url::to(['article/cat-index', 'category' => $model->article_category_id]); ?>"><?= Html::encode($model->articleCategoryName) ?></a>
                        </div>
                        <div class="b-article__header__info__social">
                            <!--<a href="#"><img src="images/b-article__header__info__social/1.jpg" alt=""></a>-->
                        </div>
                    </div>
                </div>
                <div class="b-article__content">
                    <?= $model->content ?>
                </div>
            </div>

            <?= ArticleSeeAlsoWidget::widget([
                    'articleCategoryId'=>$model->article_category_id,
            ]); ?>

        </div>

        <?= ArticleLastIssuesWidget::widget([
        ]); ?>

    </div>
</div>
