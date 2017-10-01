<?php
use frontend\widgets\user\ProfileStatWidget;
use frontend\widgets\profile\StatTrusteesWidget;

$title = $model->isCompany ? \Yii::t('app', 'TRUSTED_COMPANY') : \Yii::t('app', 'MY_TRUSTEES');
$this->title = $title;

$prevTitle  = $model->isCompany ? \Yii::t('app', 'COMPANY_PROFILE') . " " . $model->name  : \Yii::t('app', 'USER_PROFILE') . " " . $model->fullName;
$prevUrl    = $model->isCompany ? 'company/profile' : 'users/profile';
$url        = $model->isCompany ? 'company/alltrustees' : 'users/alltrustees';

$this->params['breadcrumbs'] = [
                ['label' => $prevTitle, 'url' => [$prevUrl, 'id' => $model->id]],
                ['label' => $title, 'url' => [$url, 'id' => $model->id]]
            ];
?>
<div class="container">
    <div id="main">

        <!-- begin b-content -->
        <div class="b-content">

            <!-- begin b-user -->
            <div class="b-user b-block">
                <!-- div class="b-title">
                    <?= Yii::t('app', 'RATING_COMPANY') ?>
                </div -->
                <?= ProfileStatWidget::widget(['model' => $model]); ?>
            </div>
            <?= StatTrusteesWidget::widget(['model' => $model, 'countListView' => 100]) ?>
        </div>
        <!-- end b-content -->

        <?= \frontend\widgets\profile\RatingAmongCompaniesWidget::widget([
            'model' => $model
        ]) ?>

    </div>
</div>