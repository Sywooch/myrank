<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\widgets\article\ArticleLastIssuesWidget;
use frontend\widgets\article\ArticleSeeAlsoWidget;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                            <a href="#"><?= Html::encode($model->articleCategory->name) ?></a>
                        </div>
                        <div class="b-article__header__info__social">
                            <!--<a href="#"><img src="images/b-article__header__info__social/1.jpg" alt=""></a>-->
                        </div>
                    </div>
                </div>
                <div class="b-article__content">
                    <?= Html::encode($model->content) ?>
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
