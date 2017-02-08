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
        <div class="b-content">
            <div class="b-block articles-list">
                <div class="b-title">Блог статей</div>
                <div class="b-articles__content">
<?php
            if ($articles_count>0) {
                $counter_post = 0;
                foreach ($posts as $post) {
                    ++$counter_post;
                    if ($counter_post % 2 == 1) {
              ?>
                    <div class="articles-list__item">
                        <div class="row"><?php
                    }
                      ?>    <div class="col-xs-12 col-sm-6">
                                <div class="b-articles__item b-articles__item_large">
                                    <div class="b-articles__item__image">
                                        <a href="/article/<?= $post->id_article ?>"><img src="<?= $post->header_image_small ?>" alt=""></a>
                                    </div>
                                    <div class="b-articles__item__content">
                                        <div class="b-articles__item__title">
                                            <a href="/article/<?= $post->id_article ?>"><?= $post->title ?></a>
                                        </div>
                                        <div class="b-articles__item__text">
                                            <?= $post->abridgment ?>
                                        </div>
                                        <div class="b-articles__item__tags">
                                            <a href="#"><?= $post->article_category_id ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
                    if (($counter_post % 2 == 1) && ($counter_post == $articles_count)) {
echo '                        </div>'.PHP_EOL;
echo '                    </div>'.PHP_EOL;
                    }
                    if ($counter_post % 2 == 0) {?>
                        </div>
                    </div><?php
                    }
                }
            }
?>
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
            </div>
        </div>
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
    </div>
</div>
<?php
    echo $model->articleCategory->name;
?>
