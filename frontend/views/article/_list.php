<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

            if ($index % 2 == 0) {
                ?>
                <div class="articles-list__item">
                <div class="row"><?php
            }
            if ($index % 2 == 1) {

            }
            ?>    <div class="col-xs-12 col-sm-6">
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
            </div><?php
            if (($index % 2 == 0) && ($index == ($paginationPageSize-1))) {
                echo '                        </div>'.PHP_EOL;
                echo '                    </div>'.PHP_EOL;
            }
            if ($index % 2 == 1) {?>
                </div>
                </div><?php
            }


?>




<!-- <div class="news-item"> -->
    <?php
        //$counter_post = 0;
        //++$counter_post;
        //if ($counter_post % 2 == 1) echo '<br>'.$counter_post.' чет<br>';
                /*echo Html::encode($model->header)*/
        //echo 'key = '.$key.', index = '.$index.'<br>';//key 1,2,3,...на весь список // index 0, 1, на каждой странице обнуляется
        //echo 'index = '.$index.'<br>';
        //echo Html::encode($model->id_article);
        //echo Html::encode($model->title);
        //echo Html::encode($model->header_title);
        //echo Html::encode($model->header_image_small);
        //echo Html::encode($model->articleCategory->name);
        //echo Html::encode($model->views);
        //echo Html::encode($model->create_time);
        //echo HtmlPurifier::process($model->abridgment);

        //if ($counter_post % 2 == 0) echo '<br>нечет<br>';
?>
<!-- </div> -->