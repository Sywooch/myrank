<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

if ($index == 0) {
    ?>
    <div class="b-articles">
        <div class="container">
            <h2><?= \Yii::t('app', 'NEWS'); ?></h2>
            <div class="row">
                <!-- Begin First Page -->
                <div class="col-xs-12 col-sm-6">
                    <div class="b-articles__content">
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
                                    <a href="<?= Url::toRoute(['article/index', 'category' => $model->article_category_id]) ?>"><?= $model->articleCategoryName ?></a>
                                </div>
                                <?php if ($model->header_title) : ?>
                                    <div class="b-article__header__title">
                                        <span><?= Html::encode($model->header_title) ?></span>
                                    </div>
                                <?php endif; ?>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Page -->
                <!-- Begin Next 3 pages -->
                <div class="col-xs-12 col-sm-6">
                    <div class="b-articles__content">
                        <?php
                    } else {
                        ?>
                        <div class="b-articles__item">
                            <div class="b-articles__item__image">
                                <img src="<?= $model->header_image_small_square ?>" alt="">
                            </div>
                            <div class="b-articles__item__content">
                                <div class="b-articles__item__title">
                                    <a href="<?= Url::to(['article/view', 'id' => $model->id_article]); ?>"><?= $model->title ?></a>
                                </div>
                                <div class="b-articles__item__text">
                                    <?= $model->abridgment ?>
                                </div>
                                <div class="b-articles__item__tags">
                                    <a href="<?= Url::toRoute(['article/index', 'category' => $model->article_category_id]) ?>"><?= $model->articleCategory->name ?></a>
                                </div>
                                <?php if ($model->header_title) : ?>
                                    <div class="b-article__header__title">
                                        <span><?= Html::encode($model->header_title) ?></span>
                                    </div>
                                <?php endif; ?>                                
                            </div>
                        </div>
                        <?php
                    }
                    if ($index == 3) {
                        ?>
                    </div>
                </div>
                <!-- End Next 3 pages -->
            </div>
        </div>
    </div>
    <?php
}
?>

