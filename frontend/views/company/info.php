<?php
use frontend\widgets\user\ProfileStatWidget;
use frontend\widgets\profile\StatMarksWidget;
use frontend\widgets\profile\StatTestimonialsWidget;
use frontend\widgets\profile\StatTrusteesWidget;

$this->title = \Yii::t('app', 'INFORMATION');

$prevTitle  = $model->isCompany ? \Yii::t('app', 'COMPANY_PROFILE') . " " . $model->name  : \Yii::t('app', 'USER_PROFILE') . " " . $model->fullName;
$prevUrl    = $model->isCompany ? 'company/profile' : 'users/profile';
$url        = $model->isCompany ? 'company/info' : 'users/info';

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
                    <?php 
                        if($model->isCompany) {
                            $out = Yii::t('app', 'RATING_COMP');
                        } else {
                            $out = Yii::t('app', 'RATING_USER');
                        }
                        echo $out;
?>
                </div -->
                <?= ProfileStatWidget::widget(['model' => $model]); ?>
            </div>
            
            <?= StatTrusteesWidget::widget(['model' => $model]) ?>
            <?= StatMarksWidget::widget(['model' => $model]) ?>
            <?= StatTestimonialsWidget::widget(['model' => $model]) ?>
        </div>
        <!-- end b-content -->

        <?= \frontend\widgets\profile\RatingAmongCompaniesWidget::widget() ?>

    </div>
</div>