<?php
use frontend\widgets\user\ProfileStatWidget;
use frontend\widgets\profile\StatMarksWidget;
use frontend\widgets\profile\StatTestimonialsWidget;
use frontend\widgets\profile\StatTrusteesWidget;
?>
<div class="container">
    <div id="main">

        <!-- begin b-content -->
        <div class="b-content">

            <!-- begin b-user -->
            <div class="b-user b-block">
                <div class="b-title">
                    Рейтинг компании
                </div>
                <?= ProfileStatWidget::widget(['model' => $model]); ?>
            </div>
            
            <?= StatTrusteesWidget::widget(['model' => $model]) ?>
            <?= StatMarksWidget::widget(['model' => $model]) ?>
            <?= StatTestimonialsWidget::widget(['model' => $model]) ?>
        </div>
        <!-- end b-content -->

        <!-- begin b-sidebar -->
        <aside class="b-sidebar">

            <!-- begin b-list-rating -->
            <div class="b-list-rating b-block">
                <div class="b-title">Рейтинг среди компаний</div>
                <div class="b-list-rating__container">

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>

                    <div class="b-list-rating__item">
                        <div class="b-text-rows">
                            <div class="b-text-rows__aside-left b-list-rating__logo">
                                <img src="images/company.png" alt="Название">
                            </div>

                            <div class="b-text-rows__main b-list-rating__main">
                                <div class="b-list-rating__name">Название компании конкурента</div>
                                <div class="b-list-rating__stats">
                                    <ul class="b-stats">
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_users"></i>
                                            <span class="b-stats__numbs">1</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_diagram"></i>
                                            <span class="b-stats__numbs">2</span>
                                        </li>
                                        <li class="b-stats__item">
                                            <i class="b-stats__icon b-stats__icon_comments"></i>
                                            <span class="b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="b-text-rows__aside-right b-list-rating__score">
                                <div class="b-list-rating__label">Рейтинг:</div>
                                <div class="b-list-rating__numbs">207</div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="#" class="b-list-rating__link-more">
                    <span class="b-more b-more_icon-right">
                        <span class="b-more__text">Весь рейтинг</span>
                    </span>
                </a>
            </div>
            <!-- end b-list-rating -->

        </aside>
        <!-- end b-sidebar -->

    </div>
</div>