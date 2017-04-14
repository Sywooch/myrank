<?php
use frontend\widgets\article\ArticleSeeAlsoWidget;
use yii\helpers\Html;
use yii\widgets\ListView;
?>

<div class="b-block articles-list">
    <div class="b-title"><?= \Yii::t('app','READ_ALSO'); ?></div>
    <div class="b-articles__content">
        <div class="articles-list__item">
            <div class="row">
        <?php
        echo ListView::widget([
            'dataProvider' => $listDataProvider,
            'itemView' => '_listArticleSeeAlso',
            'layout' => '{items}',
            'viewParams' => [],
            'options' => [  // array	Настройка внешнего контейнера списка (HTML атрибуты для контейнера)
                'tag' => false,
            ],
            'itemOptions' => [ // array Настройка контейнера записи списка (HTML атрибуты для контейнера)
                'tag' => false,
            ],
        ]);
        ?>
            </div>
        </div>
    </div>
</div>