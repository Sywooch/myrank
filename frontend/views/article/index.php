<?php

use yii\widgets\ListView;
use frontend\widgets\article\ArticleLastIssuesWidget;

$this->title = \Yii::t('app', 'ARTICLES');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['#']];
?>

<div class="container">
    <div id="main">
        <div class="b-content">
            <div class="b-block articles-list">
                <div class="b-title"><?= \Yii::t('app', 'ARTICLES') ?></div>
                <div class="b-articles__content">
                    <?php
                    echo ListView::widget([
                        'dataProvider' => $listDataProvider,
                        'itemView' => '_list',
                        'viewParams' => [
                            'paginationTotalPages' => $paginationTotalPages,
                            'paginationLastPageCount' => $paginationLastPageCount
                        ],
                        'layout' => '{items}<div class="b-pagination">{pager}</div>',
                        'options' => [
                            'tag' => 'div',
                            'class' => 'articles-list__item',
                            'id' => false
                        ],
                        'itemOptions' => [
                            'tag' => false,
                        ],
                        'pager' => [
                            'maxButtonCount' => 5,
                            'hideOnSinglePage' => true,
                            // Customzing options for pager container tag
                            'options' => [
                                'class' => false, //'b-pagination',
                                'id' => false,
                            ],
                            'activePageCssClass' => 'active',
                            'disabledPageCssClass' => null,
                            // Customzing CSS class for navigating link
                            'prevPageCssClass' => 'b-pagination__prev',
                            'nextPageCssClass' => 'b-pagination__next',
                            'firstPageCssClass' => 'b-pagination__first',
                            'lastPageCssClass' => 'b-pagination__last',
                            'nextPageLabel' => "",
                            'prevPageLabel' => "",
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <?=
        ArticleLastIssuesWidget::widget([
                //'message' => ''
        ]);
        ?>

    </div>
</div>