<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="container">
    <div id="main">

        <!-- begin b-content -->
        <div class="b-content">

            <!-- begin b-text -->
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
                            <a href="#"><?= Html::encode($model->article_category_id) ?></a>
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
            <!-- end b-text -->

            <!-- begin b-articles-list -->
            <div class="b-block articles-list">
                <div class="b-title">Читайте также</div>
                <div class="b-articles__content">
                    <div class="articles-list__item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="b-articles__item b-articles__item_large">
                                    <div class="b-articles__item__image">
                                        <img src="images/b-articles/b-articles_large/1.jpg" alt="">
                                    </div>
                                    <div class="b-articles__item__content">
                                        <div class="b-articles__item__title">
                                            Формула успешного собеседования
                                        </div>
                                        <div class="b-articles__item__text">
                                            ТОП пользователей с максимальным рейтингом. ТОП
                                            пользователей с максимальным рейтингом. Пользователи с
                                            максимальным рейтингом.
                                        </div>
                                        <div class="b-articles__item__tags">
                                            <a href="#">Продуктивность</a>
                                            <a href="#">Новости</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="b-articles__item b-articles__item_large">
                                    <div class="b-articles__item__image">
                                        <img src="images/b-articles/b-articles_large/1.jpg" alt="">
                                    </div>
                                    <div class="b-articles__item__content">
                                        <div class="b-articles__item__title">
                                            Формула успешного собеседования
                                        </div>
                                        <div class="b-articles__item__text">
                                            ТОП пользователей с максимальным рейтингом. ТОП
                                            пользователей с максимальным рейтингом. Пользователи с
                                            максимальным рейтингом.
                                        </div>
                                        <div class="b-articles__item__tags">
                                            <a href="#">Продуктивность</a>
                                            <a href="#">Новости</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end b-articles-list -->

        </div>
        <!-- end b-content -->

        <!-- begin b-sidebar -->
        <aside class="b-sidebar">

            <div class="b-block">
                <div class="b-title">Последние материалы</div>
                <div class="b-articles__content">
                    <div class="b-articles__item">
                        <div class="b-articles__item__image">
                            <img src="images/b-articles/b-articles_small/1.jpg" alt="">
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
                            <img src="images/b-articles/b-articles_small/2.jpg" alt="">
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
                            <img src="images/b-articles/b-articles_small/3.jpg" alt="">
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
                    <div class="link">
                        <a href="#"><span>Посмотреть всех</span></a>
                    </div>
                </div>
            </div>

        </aside>
        <!-- end b-sidebar -->

    </div>
</div>
