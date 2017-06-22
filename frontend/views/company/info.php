<?php
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
                    Рейтинг компании
                </div>
                <?= ProfileStatWidget::widget([
                    'model' => $model
                ]); ?>

                <!-- begin b-company-trusted ->
                <div class="b-company-trusted">
                    <div class="b-title b-title_grey">
                        Доверенные компании
                    </div>

                    <div class="b-company-trusted__container clearfix">
                        <?php // foreach () ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-small-date">23.05.2017  12:32</div>
                            <div class="b-card b-card_new b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <a class="button-small b-card__button" href="#">Подтвердить</a>
                                <div><a href="#" class="b-link">Отказать</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-small-date">23.05.2017  12:32</div>
                            <div class="b-card b-card_new b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <a class="button-small b-card__button" href="#">Подтвердить</a>
                                <div><a href="#" class="b-link">Отказать</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-small-date">23.05.2017  12:32</div>
                            <div class="b-card b-card_new b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <a class="button-small b-card__button" href="#">Подтвердить</a>
                                <div><a href="#" class="b-link">Отказать</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-small-date">23.05.2017  12:32</div>
                            <div class="b-card b-card_new b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <a class="button-small b-card__button" href="#">Подтвердить</a>
                                <div><a href="#" class="b-link">Отказать</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-small-date">23.05.2017  12:32</div>
                            <div class="b-card b-card_new b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <a class="button-small b-card__button" href="#">Подтвердить</a>
                                <div><a href="#" class="b-link">Отказать</a></div>
                            </div>
                        </div>
                    
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-small-date">23.05.2017  12:32</div>
                            <div class="b-card b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <div><a href="#" class="b-link b-link_red">Удалить</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-card b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <div><a href="#" class="b-link b-link_red">Удалить</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-card b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <div><a href="#" class="b-link b-link_red">Удалить</a></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="b-card b-company-trusted__item">
                                <img class="b-card__logo" src="images/b-card/1.jpg" alt="logo">
                                <div class="b-card__name">Анастасия Константинова</div>
                                <div class="b-card__post">Проект-менеджер</div>
                                <div><a href="#" class="b-link b-link_red">Удалить</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="b-company-trusted__container">
                        <a href="#" class="b-company-trusted__link-more">
                            <span class="b-more b-more_icon-right">
                                <span class="b-more__text">Все доверенные</span>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- end b-company-trusted -->
            </div>
            <!-- end b-user -->

            <?= StatMarksWidget::widget(['model' => $model]); ?>
            
            <!-- begin b-comments -->
            <div class="b-comments b-block">
                <div class="b-title">
                    Отзывы компании
                    <a class="button-small" href="#">Оставить отзыв</a>
                </div>
                <div class="b-comments__content">
                    <div class="b-comments__item">
                        <div class="b-comments__item__image">
                            <img src="images/users/2.jpg" alt="">
                            <div class="b-comments__item__number">
                                978
                            </div>
                        </div>
                        <div class="b-comments__item__info">
                            <div class="b-comments__item__date">
                                5.12.2016
                            </div>
                            <div class="b-comments__item__smile b-comments__item__smile_positive"></div>
                            <div class="b-comments__item__actions">
                                <a href="#">Ответить</a>
                                <a href="#">Пожаловаться</a>
                            </div>
                        </div>
                        <div class="b-comments__item__content">
                            <div class="b-comments__item__title">
                                Отличный работник!
                            </div>
                            <div class="b-comments__item__name">
                                Ева Гарднер
                            </div>
                            <div class="b-comments__item__post">
                                Инженер
                            </div>
                            <div class="b-comments__item__text">
                                <p>
                                    Далеко-далеко за словесными горами в
                                    стране гласных и согласных живут рыбные
                                    тексты. Вдали от всех живут они в буквенных
                                    домах на берегу Семантика большого
                                    языкового океана. Маленький ручеек журчит.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="b-comments__item">
                        <div class="b-comments__item__image">
                            <img src="images/users/4.jpg" alt="">
                            <div class="b-comments__item__number">
                                978
                            </div>
                        </div>
                        <div class="b-comments__item__info">
                            <div class="b-comments__item__date">
                                5.12.2016
                            </div>
                            <div class="b-comments__item__smile b-comments__item__smile_negative"></div>
                            <div class="b-comments__item__actions">
                                <a href="#">Ответить</a>
                                <a href="#">Пожаловаться</a>
                            </div>
                        </div>
                        <div class="b-comments__item__content">
                            <div class="b-comments__item__title">
                                Доволен сотрудничеством
                            </div>
                            <div class="b-comments__item__name">
                                Денис Пашков
                            </div>
                            <div class="b-comments__item__post">
                                Менеджер
                            </div>
                            <div class="b-comments__item__text">
                                <p>
                                    Далеко-далеко за словесными горами в
                                    стране гласных и согласных живут рыбные
                                    тексты. Вдали от всех живут они в буквенных
                                    домах на берегу Семантика большого
                                    языкового океана.
                                </p>
                            </div>
                            <div class="b-comments__item__answer">
                                <div class="b-comments__item__answer__image">
                                    <img src="images/users/5.jpg" alt="">
                                </div>
                                <div class="b-comments__item__answer__text">
                                    <p>
                                        Спасибо за эти замечательные
                                        слова! надеюсь поработать вместе
                                        еще не раз!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-comments__item">
                        <div class="b-comments__item__image">
                            <img src="images/users/3.jpg" alt="">
                            <div class="b-comments__item__number">
                                978
                            </div>
                        </div>
                        <div class="b-comments__item__info">
                            <div class="b-comments__item__date">
                                5.12.2016
                            </div>
                            <div class="b-comments__item__smile b-comments__item__smile_neutral"></div>
                            <div class="b-comments__item__actions">
                                <a href="#">Ответить</a>
                                <a href="#">Пожаловаться</a>
                            </div>
                        </div>
                        <div class="b-comments__item__content">
                            <div class="b-comments__item__title">
                                Отличный работник!
                            </div>
                            <div class="b-comments__item__name">
                                Анна Скрынник
                            </div>
                            <div class="b-comments__item__post">
                                Рекрутер
                            </div>
                            <div class="b-comments__item__text">
                                <p>
                                    Далеко-далеко за словесными горами в
                                    стране гласных и согласных живут рыбные
                                    тексты.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="b-comments__button-more">
                        <span class="b-comments__button-more__default">БОЛЬШЕ</span>
                        <span class="b-comments__button-more__loading"></span>
                    </div>
                </div>
            </div>
            <!-- end b-comments -->



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