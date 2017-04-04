<?php
// $itemView, $model, $key, $index, $widget
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
            if ($index % 2 == 0) {
                //<div class="articles-list__item">
                echo PHP_EOL;
                echo '                                ';
                ?><div class="row"><?php
                //echo PHP_EOL;
                echo '                                    ';
            }
            echo PHP_EOL;
            echo '                                    ';
                                  ?><div class="col-xs-12 col-sm-6">
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
                                                    <a href="<?= Url::to(['article/index', 'category' => $model->article_category_id]); ?>"><?= $model->articleCategory->name ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><?php //echo '$index='.$index.'<br>';
           if (($index % 2 == 0) && ($index == ($paginationLastPageCount-1)) && ($paginationTotalPages == Yii::$app->request->get('page'))) { // query_result_counter
                echo PHP_EOL;
                echo '                               ';
                echo '</div>'.PHP_EOL;
                //echo '</div>'.PHP_EOL;
                //echo '                    </div>'.PHP_EOL;
            }
            if ($index % 2 == 1) {
                echo PHP_EOL;
                echo '                ';
                echo '</div>'.PHP_EOL;
                // <!-- </div> -->
            }
        //echo Html::encode($model->create_time);
        //echo HtmlPurifier::process($model->abridgment);
?>
