<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div id="main">
        <!-- begin b-content -->
        <div class="b-block articles-list"> <!-- b-content -->
            <div class="b-title">Блог статей</div>

            <!-- begin b-articles__content !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
            <div class="b-articles__content">
                <?php if ($articles_count>0) {
                    $counter = 0;
                    foreach ($posts as $post) {
                        ++$counter;
                        if ($counter % 2 !== 0) {?>
                            <div class="articles-list__item">
                            <div class="row">
                        <?php } ?>
                        <div class="col-xs-12 col-sm-6">
                            <div class="b-articles__item b-articles__item_large">
                                <div class="b-articles__item__image">
                                    <a href="/article/<?= $post->id_article; ?>"><img src="<?= $post->header_image_small; ?>" alt=""></a>
                                </div>
                                <div class="b-articles__item__content">
                                    <div class="b-articles__item__title">
                                        <a href="/article/<?= $post->id_article; ?>"><?= $post->title; ?></a>
                                    </div>
                                    <div class="b-articles__item__text">
                                        <?= $post->abridgment; ?>
                                    </div>
                                    <div class="b-articles__item__tags">
                                        <a href="#"><?= $post->article_category_id; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($counter % 2 == 0) { ?>
                            </div>
                            </div>
                        <?php }
                    }
                } ?>
            </div>
            <!-- end b-articles__content !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->



            <div class="b-pagination">
                <ul>
                    <li class="b-pagination__prev"><a href="#"></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="b-pagination__next"><a href="#"></a></li>
                </ul>
            </div>
        </div>
        <!-- end b-content -->
        <!-- begin b-sidebar -->
        <aside class="b-sidebar">
            <div class="b-block">
                <div class="b-title">Последние материалы</div>
                <div class="b-articles__content">
                    <div class="b-articles__item">
                        <div class="b-articles__item__image">
                            <img src="http://project-1.topsu.ru/images/b-article__header__image/1.jpg" alt="">
                        </div>
                        <div class="b-articles__item__content">
                            <div class="b-articles__item__title">
                                что вы себе пожелали бы в следующем году?
                            </div>
                            <div class="b-articles__item__text">
                                ТОП пользователей с максимальным рейтингом. ТОП
                                пользователей с максимальным рейтингом.
                            </div>
                            <div class="b-articles__item__tags">
                                <a href="#">Продуктивность</a>
                                <a href="#">Новости</a>
                            </div>
                        </div>
                    </div>
                    <div class="b-articles__item">
                        <div class="b-articles__item__image">
                            <img src="http://project-1.topsu.ru/images/b-article__header__image/1.jpg" alt="">
                        </div>
                        <div class="b-articles__item__content">
                            <div class="b-articles__item__title">
                                Amazon заменила курьеров дронами
                            </div>
                            <div class="b-articles__item__text">
                                ТОП пользователей с максимальным рейтингом. ТОП
                                пользователей с максимальным рейтингом.
                            </div>
                            <div class="b-articles__item__tags">
                                <a href="#">Образование</a>
                            </div>
                        </div>
                    </div>
                    <div class="b-articles__item">
                        <div class="b-articles__item__image">
                            <img src="http://project-1.topsu.ru/images/b-article__header__image/1.jpg" alt="">
                        </div>
                        <div class="b-articles__item__content">
                            <div class="b-articles__item__title">
                                25 фраз для собеседования на английском
                            </div>
                            <div class="b-articles__item__text">
                                ТОП пользователей с максимальным рейтингом. ТОП
                                пользователей с максимальным рейтингом.
                            </div>
                            <div class="b-articles__item__tags">
                                <a href="#">Продуктивность</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- end b-sidebar -->
    </div>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- begin b-block articles-list -->
<div class="b-block articles-list"> <!-- b-block articles-list -->
    <!-- begin b-title -->
    <div class="b-title">Блог статей</div>
    <!-- end b-title -->


    <!-- begin b-articles__content -->
    <div class="b-articles__content">
        <?php if ($articles_count>0) {
            $counter = 0;
            foreach ($posts as $post) {
                ++$counter;
                if ($counter % 2 !== 0) {?>
                    <div class="articles-list__item">
                    <div class="row">
                <?php } ?>
                <div class="col-xs-12 col-sm-6">
                    <div class="b-articles__item b-articles__item_large">
                        <div class="b-articles__item__image">
                            <a href="/article/<?= $post->id_article; ?>"><img src="<?= $post->header_image_small; ?>" alt=""></a>
                        </div>
                        <div class="b-articles__item__content">
                            <div class="b-articles__item__title">
                                <a href="/article/<?= $post->id_article; ?>"><?= $post->title; ?></a>
                            </div>
                            <div class="b-articles__item__text">
                                <?= $post->abridgment; ?>
                            </div>
                            <div class="b-articles__item__tags">
                                <a href="#"><?= $post->article_category_id; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($counter % 2 == 0) { ?>
                    </div>
                    </div>
                <?php }
            }
        } ?>
    </div>
    <!-- end b-articles__content -->

    <!-- begin b-pagination -->
    <!-- <div class="b-pagination">
        <ul>
            <li class="b-pagination__prev"><a href="#"></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li class="b-pagination__next"><a href="#"></a></li>
        </ul>
    </div> -->
    <!-- end b-pagination -->
</div>
<!-- end b-block articles-list -->

<!-- begin b-text -->
<div class="b-article b-block">
    <div class="b-title">
        <h1>model->title</h1>
    </div>
    <div class="b-article__header">
        <div class="b-article__header__title">
            <span>$model->header_title</span>
        </div>
        <div class="b-article__header__image">
            <img src="model->header_image" alt="">
        </div>
        <div class="b-article__header__info">
            <div class="b-articles__item__tags">
                <a href="#">model->article_category_id</a>
            </div>
            <div class="b-article__header__info__social">
            </div>
        </div>
    </div>
    <div class="b-article__content">
        model->content
    </div>
</div>
<!-- end b-text -->