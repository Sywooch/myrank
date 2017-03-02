<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

    if($index==0) {
?>
<div class="b-articles">
    <div class="container">
        <h2>Статьи</h2>
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
                                <a href="#"><?= $model->articleCategory->name ?></a>
                            </div>
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
                                <a href="#"><?= $model->articleCategory->name ?></a>
                            </div>
                        </div>
                    </div>
<?php
    }
    if($index==3) {
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

