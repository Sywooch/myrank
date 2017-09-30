<?php
use frontend\widgets\profile\RatingAmongCompaniesWidget;
use frontend\widgets\user\ProfileStatWidget;
use frontend\widgets\profile\StatMarksWidget;

$title = $model->isCompany ? \Yii::t('app', 'COMPANY_MARKS') : \Yii::t('app', 'MY_MARKS');
$this->title = $title;

$prevTitle  = $model->isCompany ? \Yii::t('app', 'COMPANY_PROFILE') . " " . $model->name  : \Yii::t('app', 'USER_PROFILE') . " " . $model->fullName;
$prevUrl    = $model->isCompany ? 'company/profile' : 'users/profile';
$url        = $model->isCompany ? 'company/allmarks' : 'users/allmarks';

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