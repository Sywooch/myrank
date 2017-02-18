<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;

use yii\data\ActiveDataProvider;
//use app\models\Article;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$widget = \yii\widgets\ListView::begin([ some code ]);
////<ul class="cam-list row clearfix">
//    <?php echo $widget->renderItems();
////</ul>
// echo $widget->renderPager();


$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;

?>    <!-- <div class="container"> -->
        <div class="container">
            <!-- <div id="main"> -->
            <div id="main">
                <!-- <div class="b-content"> -->
                <div class="b-content">
                    <!-- ////////////////////////////////////////////////////////////////// -->

                    <!-- <div class="b-block articles-list"> -->
                    <div class="b-block articles-list">
                        <div class="b-title">Блог статей</div>
                        <!-- div class= b-articles__content -->
                        <div class="b-articles__content"><?php
    echo PHP_EOL;
    echo '                            ';

        // Виджет списка новостей
        echo ListView::widget([
            'dataProvider' => $listDataProvider, // Данные списка
            'itemView' => '_list', // Имя представления (view) для вывода записи
            'viewParams' => [
                //'paginationPageSize' => $paginationPageSize,
                'articlesCount' => $articlesCount
            ],
            'layout' => '{items}<div class="b-pagination">{pager}</div><div class="b-summary">{summary}</div>',// через \n // string Макет списка
            'options' => [  // array	Настройка внешнего контейнера списка (HTML атрибуты для контейнера)
                'tag' => 'div',
                'class' => 'articles-list__item',
                'id' => false
            ],
            'itemOptions' => [ // array Настройка контейнера записи списка (HTML атрибуты для контейнера)
                    'tag' => false,
            ],
            'pager' => [ // array Постраничная навигация
                'firstPageLabel' =>
                    //'<i class="glyphicon glyphicon-backward"></i>',
                    '<span class="glyphicon glyphicon-backward"></span>',//'<<',
                'lastPageLabel' =>
                    //'<i class="glyphicon glyphicon-forward"></i>',
                    '<span class="glyphicon glyphicon-forward"></span>',//'>>',
                'nextPageLabel' =>
                    //'<i class="glyphicon glyphicon-chevron-right"></i>',
                    '<span class="glyphicon glyphicon-chevron-right"></span>',//'>',
                'prevPageLabel' =>
                    //'<i class="glyphicon glyphicon-chevron-left">',
                    '<span class="glyphicon glyphicon-chevron-left"></span>',//'<',

                'maxButtonCount' => 5,
                'hideOnSinglePage'=>true,

                // Customzing options for pager container tag
                'options' => [
                    'class' => false,//'b-pagination',
                    'id' => false,
                ],

                // Customzing CSS class for pager link
                //'linkOptions' => ['class' => 'mylink11'],
                'activePageCssClass' => 'active',//'myactive',
                'disabledPageCssClass' => null,//'mydisable',

                // Customzing CSS class for navigating link
                'prevPageCssClass' => 'b-pagination__prev',//'mypre',
                'nextPageCssClass' => 'b-pagination__next',//'mynext',
                'firstPageCssClass' => 'b-pagination__first',//'myfirst',
                'lastPageCssClass' => 'b-pagination__last'// 'mylast',
            ],
            'summary' => 'Показано {begin}-{end} из {totalCount}', // string Информация о списке
            //'summaryOptions' => [ ],// array Настройка контейнера для summary (HTML атрибуты для контейнера)
            'emptyText' => 'Список пуст', // string Текст при отсутствии элементов списка
            'emptyTextOptions' => [ // array Настройка контейнера для emptyText (HTML атрибуты для контейнера)
                'tag' => 'p'
            ],
            //'itemView' => function ($model, $key, $index, $widget) {
            //    return Html::a(Html::encode($model->title), ['view', 'id' => $model->id_article]);
            //},
        ]);

?>
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



                </div> <!-- div class= b-articles__content -->
            </div> <!-- <div class="b-block articles-list"> -->

<!-- ////////////////////////////////////////////////////////////////// -->

        </div> <!-- <div class="b-content"> -->
        <!-- <aside class="b-sidebar"> -->
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
        <!-- <aside class="b-sidebar"> -->
    </div> <!-- <div id="main"> -->
</div> <!-- <div class="container"> -->