<?php

use yii\helpers\Url;
use yii\widgets\Menu;
use frontend\models\UserConstant;
use frontend\widgets\user\TopNotificationWidget;

if (Yii::$app->user->id === null) {
    ?>
    <div class="col-xs-12 col-sm-6">
        <div class="b-header__user">
            <div class="b-header__user__login">
                <span><?= \Yii::t('app', 'WELCOME_TO_MYRANK'); ?></span>
                <a class="signin" href="#">
                    <span><?= \Yii::t('app', 'AUTHORIZATION'); ?></span>
                </a>
            </div>
        </div>
    </div>
    <?php
} else {
    $model = UserConstant::getProfile();
    $objUrl = $model->isCompany ? 'company' : 'users';
    $link['info'] = $model->isCompany ? ["$objUrl/info", 'id' => $model->id] : ["$objUrl/info"];
    $link['profile'] = ["$objUrl/profile", 'id' => $model->id];
    ?>
    <div class="col-xs-12 col-sm-6">
        <div class="b-header__user">

            <div class="b-header__user__info">
                <div class="b-header__user__info__image">
                    <img src="<?= $model->imageName ?>" alt="">
                </div>
                <div class="b-header__user__info__text">
                    <a href="<?= Url::toRoute($link['profile']); ?>">
                        <span><?= $model->fullName ?></span>
                    </a>
                </div>
                <div class="b-header__user__info__dropdown">
                    <?php
                    
                    echo Menu::widget([
                        'items' => [
                            // Important: you need to specify url as 'controller/action',
                            // not just as 'controller' even if default action is used.
                            ['label' => Yii::t('app', 'INFORMATION'), 'url' => $link['info']],
                            ['label' => Yii::t('app', 'MY_MARKS'), 'url' => ["$objUrl/allmarks"]],
                            ['label' => Yii::t('app', 'MY_TESTIMONIAL'), 'url' => ["$objUrl/alltestimonials"]],
                            //['label' => 'Количество просмотров профиля', 'url' => ['#']],
                            //['label' => 'Мои избранные' , 'url' => ['#']],
                            ['label' => Yii::t('app', 'MY_TRUSTEES'), 'url' => ["$objUrl/alltrustees"]],
                            ['label' => Yii::t('app', 'STRUCT'), 'url' => ['company/structure'], 'visible' => $model->isCompany],
                            ['label' => Yii::t('app', 'PERSONALS'), 'url' => ['company/personal'], 'visible' => $model->isCompany],
                            ['label' => \Yii::t('app', 'EXIT'), 'url' => ['site/logout']],
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <?= TopNotificationWidget::widget() ?>
        </div>
    </div>
    <?php
}

$this->registerJs("$('.signin').on('click', function () {
	url = '" . Url::toRoute("site/login") . "';
	var csrf = '" . Yii::$app->request->getCsrfToken() . "';
	showModal(url, '', 1);
	return false;
    });", \yii\web\View::POS_END);
?>