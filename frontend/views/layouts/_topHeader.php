<?php

use yii\helpers\Url;
use yii\widgets\Menu;
use frontend\models\UserConstant;

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
    $link['info'] = $model->isCompany ? ['company/info', 'id' => $model->id] : ['users/info'];
    $link['profile'] = $model->isCompany ? ['company/profile', 'id' => $model->id] : ['users/profile', 'id' => $model->id];
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
                            ['label' => 'Информация', 'url' => $link['info']],
                            ['label' => 'Структура', 'url' => ['company/structure'], 'visible' => $model->isCompany],
                            ['label' => \Yii::t('app', 'EXIT'), 'url' => ['site/logout']],
                        ],
                    ]);
                    ?>
                </div>
            </div>

            <!-- div class="b-header__user__stats clearfix">
                <div class="b-header__user__stats__item b-header__user__stats__item_trusted clearfix active">
                    <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_1"></div>
                    <span>1</span>

                    <div class="b-tooltip">
                        <div class="b-tooltip__inner">

                            <div class="b-text-image b-small-message b-tooltip__item b-tooltip__item_unread">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">
                                        <img src="images/b-tooltip/women.jpg" alt="women">
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__name">Кристина Джонс</div>
                                        <div class="b-small-message__post">Менеджер</div>
                                        <div class="b-small-message__date">23.05.2017  12:32</div>
                                    </div>
                                </div>
                                <div class="b-small-message__member-status b-small-message__member-status_online"></div>
                            </div>

                            <div class="b-text-image b-small-message b-tooltip__item b-tooltip__item_unread">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">

                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__name">Олег Петров</div>
                                        <div class="b-small-message__post">Программист</div>
                                        <div class="b-small-message__date">23.05.2017  09:56</div>
                                    </div>
                                </div>
                                <div class="b-small-message__member-status b-small-message__member-status_online"></div>
                            </div>

                            <div class="b-text-image b-small-message b-tooltip__item">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">

                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__name">Анастасия Константинова</div>
                                        <div class="b-small-message__post">Веб-дизайнер</div>
                                        <div class="b-small-message__date">20.05.2017  17:02</div>
                                    </div>
                                </div>
                            </div>

                            <a class="b-tooltip__more-link" href="#">
                                <span class="b-more b-more_icon-down">
                                    <span class="b-more__text">Больше</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="b-header__user__stats__item b-header__user__stats__item_evaluation clearfix active">
                    <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_2"></div>
                    <span>2</span>
                    <div class="b-tooltip">
                        <div class="b-tooltip__inner">

                            <div class="b-text-image b-small-message b-tooltip__item b-tooltip__item_unread">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">
                                        <img src="images/b-tooltip/women.jpg" alt="women">
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__name">Кристина Джонс</div>
                                        <div class="b-small-message__post">Менеджер</div>
                                        <div class="b-small-message__date">23.05.2017  12:32</div>
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__rating">
                                        <div class="b-small-message__rating-caption">Оценка:</div>
                                        <div class="b-small-message__rating-numbs">9.3</div>
                                    </div>
                                </div>
                                <div class="b-small-message__member-status b-small-message__member-status_online"></div>
                            </div>

                            <div class="b-text-image b-small-message b-tooltip__item b-tooltip__item_unread">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">

                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__name">Олег Петров</div>
                                        <div class="b-small-message__post">Программист</div>
                                        <div class="b-small-message__date">23.05.2017  09:56</div>
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__rating">
                                        <div class="b-small-message__rating-caption">Оценка:</div>
                                        <div class="b-small-message__rating-numbs">9.3</div>
                                    </div>
                                </div>
                                <div class="b-small-message__member-status b-small-message__member-status_online"></div>
                            </div>

                            <div class="b-text-image b-small-message b-tooltip__item">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">

                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__name">Анастасия Константинова</div>
                                        <div class="b-small-message__post">Веб-дизайнер</div>
                                        <div class="b-small-message__date">20.05.2017  17:02</div>
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__rating">
                                        <div class="b-small-message__rating-caption">Оценка:</div>
                                        <div class="b-small-message__rating-numbs">9.3</div>
                                    </div>
                                </div>
                            </div>

                            <a class="b-tooltip__more-link" href="#">
                                <span class="b-more b-more_icon-down">
                                    <span class="b-more__text">Больше</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="b-header__user__stats__item clearfix active">
                    <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_3"></div>
                    <span>5</span>
                    <div class="b-tooltip">
                        <div class="b-tooltip__inner">
                            <div class="b-text-image b-small-message b-tooltip__item b-tooltip__item_unread">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">
                                        <img src="images/b-tooltip/women.jpg" alt="women">
                                        <div class="b-small-message__number">978</div>
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__header">
                                            <div class="b-small-message__name">Кристина Джонс</div>
                                            <div class="b-small-message__date">23.05.2017 12:32</div>
                                            <div class="b-small-message__smile b-small-message__smile_positive"></div>
                                        </div>
                                        <div class="b-small-message__body">
                                            <div class="b-small-message__caption">Отличный работник!</div>
                                            <div class="b-small-message__text">Далеко-далеко за словесными горами в стране гласных и согласных живут...</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-small-message__member-status b-small-message__member-status_online"></div>
                            </div>

                            <div class="b-text-image b-small-message b-tooltip__item">
                                <div class="b-text-image__img">
                                    <div class="b-small-message__img">
                                        <img src="images/b-tooltip/women.jpg" alt="women">
                                        <div class="b-small-message__number">978</div>
                                    </div>
                                </div>
                                <div class="b-text-image__text">
                                    <div class="b-small-message__content">
                                        <div class="b-small-message__header">
                                            <div class="b-small-message__name">Кристина Джонс</div>
                                            <div class="b-small-message__date">23.05.2017 12:32</div>
                                            <div class="b-small-message__smile b-small-message__smile_negative"></div>
                                        </div>
                                        <div class="b-small-message__body">
                                            <div class="b-small-message__caption">Ужасный работник!</div>
                                            <div class="b-small-message__text">Далеко-далеко за словесными горами в стране гласных и согласных живут...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a class="b-tooltip__more-link" href="#">
                                <span class="b-more b-more_icon-down">
                                    <span class="b-more__text">Больше</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div -->

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