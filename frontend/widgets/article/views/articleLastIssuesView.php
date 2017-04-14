<?php
use frontend\widgets\article\ArticleLastIssuesWidget;
use yii\helpers\Html;
use yii\widgets\ListView;
?>

<!-- <aside class="b-sidebar"> -->
<aside class="b-sidebar">
    <div class="b-block">
        <div class="b-title"><?= \Yii::t('app','RECENT_MATERIALS'); ?></div>
<?php
        echo ListView::widget([
            'dataProvider' => $listDataProviderArticleLastIssues,
            'itemView' => '_listArticleLastIssues',
            'layout' => '{items}',
            'viewParams' => [],
            'options' => [  // array	Настройка внешнего контейнера списка (HTML атрибуты для контейнера)
                'tag' => 'div',
                'class' => 'b-articles__content',
                'id' => false
            ],
            'itemOptions' => [ // array Настройка контейнера записи списка (HTML атрибуты для контейнера)
                'tag' => false,
            ],

        ]);
?>
    </div>
</aside>
<!-- <aside class="b-sidebar"> -->
