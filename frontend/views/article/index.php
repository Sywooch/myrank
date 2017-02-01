<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div id="main">

        <!-- begin b-content -->
        <div class="b-content">

            <!-- begin b-block articles-list -->
            <div class="b-block articles-list">

                <!-- begin b-title -->
                <div class="b-title">Блог статей</div>
                <!-- end b-title -->

                <?php
                    //var_dump($searchModel,$dataProvider);

                    $query_result_counter = $dataProvider->getTotalCount();
                    if ($query_result_counter == 0)
                        return 'false';
                    else {
                        echo 'Количество статей: '.$query_result_counter.'<br>';
                        $posts =  $dataProvider->getModels();
                        foreach($posts as &$post) {
                            if(isset($post['id_article']) && !empty($post['id_article'])) {
                                echo $post['id_article'].'<br>';
                            }
                            if(isset($post['title']) && !empty($post['title'])) {
                                echo $post['title'].'<br>';
                            }
                            if(isset($post['abridgment']) && !empty($post['abridgment'])) {
                                echo $post['abridgment'].'<br>';
                            }
                            if(isset($post['content']) && !empty($post['content'])) {
                                echo $post['content'].'<br>';
                            }
                            if(isset($post['header_title']) && !empty($post['header_title'])) {
                                echo $post['header_title'].'<br>';
                            }
                            if(isset($post['header_image']) && !empty($post['header_image'])) {
                                echo $post['header_image'].'<br>';
                            }
                            if(isset($post['header_image_small']) && !empty($post['header_image_small'])) {
                                echo $post['header_image_small'].'<br>';
                            }
                            if(isset($post['article_category_id']) && !empty($post['article_category_id'])) {
                                echo $post['article_category_id'].'<br>';
                            }
                            if(isset($post['status']) && !empty($post['status'])) {
                                echo $post['status'].'<br>';
                            }
                            if(isset($post['views']) && !empty($post['views'])) {
                                echo $post['views'].'<br>';
                            }
                            if(isset($post['create_time']) && !empty($post['create_time'])) {
                                echo $post['create_time'].'<br>';
                            }
                            if(isset($post['update_time']) && !empty($post['update_time'])) {
                                echo $post['update_time'].'<br>';
                            }

                            echo '<br>';

                        }
                        /*echo yii\grid\GridView::widget([
                            'dataProvider' => $dataProvider,
                        ]);*/
                    }
                    //var_dump($dataProvider->models);
                ?>

                <!-- begin b-articles__content -->
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
                <!-- end b-articles__content -->

                <!-- begin b-pagination -->
                <!--<div class="b-pagination">
                    <ul>
                        <li class="b-pagination__prev"><a href="#"></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="b-pagination__next"><a href="#"></a></li>
                    </ul>
                </div>-->
                <!-- end b-pagination -->
            </div>
            <!-- end b-block articles-list -->

        </div>
        <!-- end b-content -->

    </div>
</div>