<?php

use frontend\widgets\user\MarksWidget;
use frontend\widgets\user\MarksDiagramWidget;
use frontend\widgets\user\UserInfoWidget;
use frontend\widgets\user\TestimonialsWidget;
use frontend\widgets\user\ProfileStatWidget;
use yii\helpers\Url;
use frontend\widgets\user\LatestMarksWidget;
use frontend\widgets\user\UserTrusteesWidget;
use frontend\widgets\image\FileUploadWidget;
use frontend\models\UserNotification;

$this->title = \Yii::t('app', 'USER_PROFILE');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['user/profile', 'id' => $model->id]];
?>

<div class="container">
    <div id="main">

        <!-- begin b-content -->
        <div class="b-content">

            <!-- begin b-user -->
            <div class="b-user b-block">
                <div class="b-user__data">
                    <div class="b-user__data__left">
                        <div class="b-user__data__image">
                            <img
                            <?php if ($model->owner) { ?>
                                    class="showModal" 
                                    data-url="<?= Url::toRoute(['users/photouserupload']) ?>" 
                                <?php } ?>
                                src="<?= $model->imageName ?>" alt="" style="cursor: pointer">
                        </div>
                    </div>
                    <div class="b-user__data__right">
                        <div class="b-user__data__header">
                            <div class="b-user__data__name">
                                <h1><?= $model->fullName ?></h1>
                                <?php if ($model->owner) { ?>
                                    <span 
                                        class="b-user__data__name__edit modalView" 
                                        data-url="<?= Url::toRoute("users/editmaininfo"); ?>"></span>
                                    <?php } ?>
                            </div>
                            <div class="b-user__data__info">
                                <?php if (!$model->owner && (Yii::$app->user->id !== NULL)) { ?>
                                    <a class="b-user__data__info__add-trusted <?= $model->trustUser ? "minus" : "" ?>" 
                                       href="#" 
                                       data-url="<?= Url::toRoute(['users/trustees', 'id' => $model->id]) ?>">
                                           <?= $model->trustUser ? \Yii::t('app', 'TRUSTED_SMALL') : \Yii::t('app', 'IN_TRUSTED_SMALL') ?>
                                    </a>
                                <?php } ?>
                                <div class="b-user__data__info__rating">
                                    <span><?= $model->rating ?></span>
                                    <?= Yii::t("app", "RATING"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="b-user__data__content">
                            <div class="b-user__data__content__item">
                                <div class="b-user__data__content__item__adress">
                                    <?= $model->position ?>
                                </div>
                            </div>
                            <?php if (isset($model->company_name) && ($model->company_name != "")) { ?>
                                <div class="b-user__data__content__item">
                                    <div class="b-user__data__content__item__work">
                                        <?= $model->company_name ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="b-tags">
                            <?php foreach ($model->profileProfession as $item) { ?>
                                <span><?= $item->title ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                    <?= ProfileStatWidget::widget([
                        'model' => $model
                    ]); ?>
                
                <?php if (($model->aboutProfile != "") || ($model->phone != "")) { ?>
                    <div class="b-user__info">
                        <div class="b-title">
                            <?= \Yii::t('app', 'PERSONAL_INFORMATION'); ?>
                        </div>
                        <div class="b-user__info__content">
                            <div class="b-user__info__text">
                                <p><?= $model->aboutProfile ?></p>
                            </div>
                            <div class="b-user__info__list">
                                <?=
                                UserInfoWidget::widget([
                                    'model' => $model,
                                    'fields' => [
                                        'phone' => $model->phone,
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($model->isCompany) { ?>
                    <div class="b-user__portfolio">
                        <div class="b-title">
                            <?= \Yii::t('app', 'PORTFOLIO'); ?>
                            <?php if ($model->owner) { ?>
                                <span 
                                    class="b-user__portfolio__edit modalView" 
                                    data-url="<?= Url::toRoute("users/editportfolio") ?>"></span>
                                <?php } ?>
                        </div>
                        <span class="b-user__portfolio__more open">
                            <span><?= \Yii::t('app', 'MINIMIZE'); ?></span>
                        </span>

                        <div class="b-user__portfolio__content">
                            <div class="b-user__portfolio__carousel js-portfolio-slider">
                                <div class="owl-carousel">
                                    <?php foreach ($model->images as $item) { ?>
                                        <div class="b-user__portfolio__item">
                                            <img 
                                                class="b-user__portfolio__item__image showModal" 
                                                src="<?= Url::toRoute(['media/viewimage', 'id' => $item->id]) ?>" 
                                                alt="image"
                                                data-url="<?= Url::toRoute(['users/viewportfolio', 'id' => $item->id]) ?>"/>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="b-user__portfolio__carousel__nav">
                                    <div class="b-user__portfolio__carousel__prev"></div>
                                    <div class="b-user__portfolio__carousel__next"></div>
                                </div>
                            </div>

                            <!-- div class="b-title">Специалисты</div>

                            <div class="b-user__portfolio__carousel js-portfolio-slider">
                                <div class="owl-carousel">
                                    <div class="b-user__portfolio__item">
                                        <img class="b-user__portfolio__item__image" src="images/b-portfolio/1.jpg" alt="image">
                                        <div class="b-user__portfolio__item__name">Анастасия Константинова</div>
                                        <div class="b-user__portfolio__item__post">Веб-дизайнер</div>
                                    </div>
                                    <div class="b-user__portfolio__item">
                                        <img class="b-user__portfolio__item__image" src="images/b-portfolio/2.jpg" alt="image">
                                        <div class="b-user__portfolio__item__name">Анастасия Константинова</div>
                                        <div class="b-user__portfolio__item__post">Веб-дизайнер</div>
                                    </div>
                                    <div class="b-user__portfolio__item">
                                        <img class="b-user__portfolio__item__image" src="images/b-portfolio/3.jpg" alt="image">
                                        <div class="b-user__portfolio__item__name">Анастасия Константинова</div>
                                        <div class="b-user__portfolio__item__post">Веб-дизайнер</div>
                                    </div>
                                    <div class="b-user__portfolio__item">
                                        <img class="b-user__portfolio__item__image" src="images/b-portfolio/4.jpg" alt="image">
                                        <div class="b-user__portfolio__item__name">Анастасия Константинова</div>
                                        <div class="b-user__portfolio__item__post">Веб-дизайнер</div>
                                    </div>
                                    <div class="b-user__portfolio__item">
                                        <img class="b-user__portfolio__item__image" src="images/b-portfolio/5.jpg" alt="image">
                                        <div class="b-user__portfolio__item__name">Анастасия Константинова</div>
                                        <div class="b-user__portfolio__item__post">Веб-дизайнер</div>
                                    </div>
                                </div>
                                <div class="b-user__portfolio__carousel__nav">
                                    <div class="b-user__portfolio__carousel__prev"></div>
                                    <div class="b-user__portfolio__carousel__next"></div>
                                </div>
                            </div>

                            <div class="b-user__portfolio__more-link">
                                <span class="b-user__portfolio__edit"></span>
                                <a href="#" class="b-more b-more_icon-right">
                                    <span class="b-more__text">Все специалисты</span>
                                </a>
                            </div -->
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- end b-user -->

            <!-- begin b-marks -->
            <?= MarksWidget::widget(['model' => $model]); ?>
            <!-- end b-marks -->


            <!-- begin b-comments -->
            <?=
            TestimonialsWidget::widget(['model' => $model]);
            ?>
            <!-- end b-comments -->

        </div>
        <!-- end b-content -->

        <!-- begin b-sidebar -->
        <aside class="b-sidebar">

            <!-- begin b-diagramm -->
            <?= MarksDiagramWidget::widget(['model' => $model]); ?>
            <!-- end b-diagramm -->

            <!-- begin b-last-marks -->
            <?= LatestMarksWidget::widget(['model' => $model]); ?>
            <!-- end b-last-marks -->

            <!-- begin b-trusted-users -->
            <?= UserTrusteesWidget::widget(['model' => $model]); ?>
            <!-- end b-trusted-users -->

        </aside>
        <!-- end b-sidebar -->

    </div>
</div>
<?php
$this->registerJs("
    $('.b-user__data__info__add-trusted').on('click', function() {
	var that = $(this);
	url = $(this).attr('data-url');
	$.post(url, {'_csrf-frontend':$('[name=\"csrf-token\"]').attr('content')}, function(out) {
	    if(out.code) {
		if(out.addClass) {
		    that.addClass('minus');
		} else {
		    that.removeClass('minus');
		}
		that.text(out.data);
		alertInfo('" . \Yii::t('app', 'YOUR_REQUEST_HAS_BEEN_SENT_AND_IS_WAITING_FOR_CONFIRMATION_BY_THE_USER') . "');
	    }
	}, 'json');
    })", yii\web\View::POS_END);

$i = 0;
echo FileUploadWidget::widget([
    'model' => new frontend\models\Images(),
    'attribute' => 'name' . $i,
    'url' => ['media/imageupload', 'id' => $i],
]);
?>