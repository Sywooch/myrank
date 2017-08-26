<?php
use frontend\widgets\profile\RatingAmongCompaniesWidget;
use frontend\widgets\user\ProfileStatWidget;
use frontend\widgets\profile\StatMarksWidget;
?>
<div class="container">
    <div id="main">
        <!-- begin b-content -->
        <div class="b-content">
            <!-- begin b-user -->
            <div class="b-user b-block">
                <div class="b-title">
                    <?= Yii::t('app', 'RATING_COMPANY') ?>
                </div>
            <?= ProfileStatWidget::widget(['model' => $model]); ?>
            </div>

            <?=
            StatMarksWidget::widget([
                'model' => $model,
                'cols' => 2,
                'countListView' => 100,
            ])
            ?>
        </div>
        <!-- end b-content -->
        <?= RatingAmongCompaniesWidget::widget() ?>
    </div>
</div>