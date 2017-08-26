<?php
use frontend\widgets\user\ProfileStatWidget;
use frontend\widgets\profile\StatTrusteesWidget;
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
            <?= StatTrusteesWidget::widget(['model' => $model, 'countListView' => 100]) ?>
        </div>
        <!-- end b-content -->

        <?= \frontend\widgets\profile\RatingAmongCompaniesWidget::widget() ?>

    </div>
</div>