<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

$this->title = "Структура компании";
$this->params['breadcrumbs'][] = ['label' => 'Компания', 'url' => ['user/profile']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['#']];
?>
<div class = "container">
    <div id = "main">

        <!--begin b-content -->
        <div class = "b-content">

            <!--begin b-user -->
            <div class = "b-user b-block">
                <div class = "b-title">
                    Структура компании
                </div>

                <div class = "b-collapse">
                    <div class = "b-collapse__item">
                        <a href = "#collapseOne" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "collapseOne">
                            <span class = "b-collapse__name">Отдел продаж</span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">3</span>
                                    <i class = "b-stats__icon b-stats__icon_people"></i>
                                </li>
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">25</span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>
                        <div class = "b-collapse__tab collapse" id = "collapseOne">
                            <div class = "b-collapse__inner">
                                <div class = "b-tabs">
                                    <div class = "b-tabs__nav clearfix">
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#order-1" class = "b-tabs__link b-tabs__link_active" aria-controls = "order-1" role = "tab" data-toggle = "tab">Веб-дизайн</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#order-2" class = "b-tabs__link" aria-controls = "order-2" role = "tab" data-toggle = "tab">Программирование</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#order-3" class = "b-tabs__link" aria-controls = "order-3" role = "tab" data-toggle = "tab">СЕО/Продвижение</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#order-4" class = "b-tabs__link" aria-controls = "order-4" role = "tab" data-toggle = "tab">Менеджмент</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#order-5" class = "b-tabs__link" aria-controls = "order-5" role = "tab" data-toggle = "tab">Копирайт</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#order-6" class = "b-tabs__link" aria-controls = "order-6" role = "tab" data-toggle = "tab">Перевод</a>
                                        </div>
                                    </div>

                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "order-1">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "order-2">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "order-3">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "order-4">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "order-5">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "order-6">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "b-collapse__item">
                        <a href = "#collapseTwo" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "collapseTwo">
                            <span class = "b-collapse__name">Бухгалтерия</span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">12</span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>
                        <div class = "b-collapse__tab collapse" id = "collapseTwo">
                            <div class = "b-collapse__inner">
                                <div class = "b-tabs">
                                    <div class = "b-tabs__nav clearfix">
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#commerce-1" class = "b-tabs__link b-tabs__link_active" aria-controls = "commerce-1" role = "tab" data-toggle = "tab">Веб-дизайн</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#commerce-2" class = "b-tabs__link" aria-controls = "commerce-2" role = "tab" data-toggle = "tab">Программирование</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#commerce-3" class = "b-tabs__link" aria-controls = "commerce-3" role = "tab" data-toggle = "tab">СЕО/Продвижение</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#commerce-4" class = "b-tabs__link" aria-controls = "commerce-4" role = "tab" data-toggle = "tab">Менеджмент</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#commerce-5" class = "b-tabs__link" aria-controls = "commerce-5" role = "tab" data-toggle = "tab">Копирайт</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#commerce-6" class = "b-tabs__link" aria-controls = "commerce-6" role = "tab" data-toggle = "tab">Перевод</a>
                                        </div>
                                    </div>

                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "commerce-1">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "commerce-2">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "commerce-3">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "commerce-4">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "commerce-5">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "commerce-6">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "b-collapse__item">
                        <a href = "#collapseThree" class = "b-collapse__nav" data-toggle = "collapse" aria-controls = "collapseThree">
                            <span class = "b-collapse__name">ИТ-отдел</span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">6</span>
                                    <i class = "b-stats__icon b-stats__icon_people"></i>
                                </li>
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">21</span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>

                        <div class = "b-collapse__tab collapse in" id = "collapseThree">
                            <div class = "b-collapse__inner">

                                <div class = "b-tabs">
                                    <div class = "b-tabs__nav clearfix">
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#it-1" class = "b-tabs__link b-tabs__link_active" aria-controls = "it-1" role = "tab" data-toggle = "tab">Веб-дизайн</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#it-2" class = "b-tabs__link" aria-controls = "it-2" role = "tab" data-toggle = "tab">Программирование</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#it-3" class = "b-tabs__link" aria-controls = "it-" role = "tab" data-toggle = "tab">СЕО/Продвижение</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#it-4" class = "b-tabs__link" aria-controls = "it-4" role = "tab" data-toggle = "tab">Менеджмент</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#it-5" class = "b-tabs__link" aria-controls = "it-5" role = "tab" data-toggle = "tab">Копирайт</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#it-6" class = "b-tabs__link" aria-controls = "it-6" role = "tab" data-toggle = "tab">Перевод</a>
                                        </div>
                                    </div>

                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "it-1">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "it-2">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "it-3">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "it-4">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "it-5">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "it-6">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class = "b-collapse__item">
                        <a href = "#collapseFour" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "collapseFour">
                            <span class = "b-collapse__name">Отдел логистики</span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">3</span>
                                    <i class = "b-stats__icon b-stats__icon_people"></i>
                                </li>
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">147</span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>
                        <div class = "b-collapse__tab collapse" id = "collapseFour">
                            <div class = "b-collapse__inner">
                                <div class = "b-tabs">
                                    <div class = "b-tabs__nav clearfix">
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#logistics-1" class = "b-tabs__link b-tabs__link_active" aria-controls = "logistics-1" role = "tab" data-toggle = "tab">Веб-дизайн</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#logistics-2" class = "b-tabs__link" aria-controls = "logistics-2" role = "tab" data-toggle = "tab">Программирование</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#logistics-3" class = "b-tabs__link" aria-controls = "logistics-3" role = "tab" data-toggle = "tab">СЕО/Продвижение</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#logistics-4" class = "b-tabs__link" aria-controls = "logistics-4" role = "tab" data-toggle = "tab">Менеджмент</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#logistics-5" class = "b-tabs__link" aria-controls = "logistics-5" role = "tab" data-toggle = "tab">Копирайт</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#logistics-6" class = "b-tabs__link" aria-controls = "logistics-6" role = "tab" data-toggle = "tab">Перевод</a>
                                        </div>
                                    </div>

                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "logistics-1">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "logistics-2">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "logistics-3">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "logistics-4">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "logistics-5">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "logistics-6">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "b-collapse__item">
                        <a href = "#collapseFive" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "collapseFive">
                            <span class = "b-collapse__name">Тех-поддержка</span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">9</span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>
                        <div class = "b-collapse__tab collapse" id = "collapseFive">
                            <div class = "b-collapse__inner">
                                <div class = "b-tabs">
                                    <div class = "b-tabs__nav clearfix">
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#support-1" class = "b-tabs__link b-tabs__link_active" aria-controls = "support-1" role = "tab" data-toggle = "tab">Веб-дизайн</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#support-2" class = "b-tabs__link" aria-controls = "support-2" role = "tab" data-toggle = "tab">Программирование</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#support-3" class = "b-tabs__link" aria-controls = "support-3" role = "tab" data-toggle = "tab">СЕО/Продвижение</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#support-4" class = "b-tabs__link" aria-controls = "support-4" role = "tab" data-toggle = "tab">Менеджмент</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#support-5" class = "b-tabs__link" aria-controls = "support-5" role = "tab" data-toggle = "tab">Копирайт</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#support-6" class = "b-tabs__link" aria-controls = "support-6" role = "tab" data-toggle = "tab">Перевод</a>
                                        </div>
                                    </div>

                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "support-1">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "support-2">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "support-3">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "support-4">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "support-5">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "support-6">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "b-collapse__item">
                        <a href = "#collapseSix" class = "b-collapse__nav collapsed" data-toggle = "collapse" aria-controls = "collapseSix">
                            <span class = "b-collapse__name">Юредический отдел</span>
                            <ul class = "b-stats b-collapse__stats">
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">2</span>
                                    <i class = "b-stats__icon b-stats__icon_people"></i>
                                </li>
                                <li class = "b-stats__item">
                                    <span class = "b-stats__numbs">7</span>
                                    <i class = "b-stats__icon b-stats__icon_man"></i>
                                </li>
                            </ul>
                        </a>
                        <div class = "b-collapse__tab collapse" id = "collapseSix">
                            <div class = "b-collapse__inner">
                                <div class = "b-tabs">
                                    <div class = "b-tabs__nav clearfix">
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#web-design-1" class = "b-tabs__link b-tabs__link_active" aria-controls = "web-design-1" role = "tab" data-toggle = "tab">Веб-дизайн</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#web-design-2" class = "b-tabs__link" aria-controls = "web-design-2" role = "tab" data-toggle = "tab">Программирование</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#web-design-3" class = "b-tabs__link" aria-controls = "web-design-3" role = "tab" data-toggle = "tab">СЕО/Продвижение</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#web-design-4" class = "b-tabs__link" aria-controls = "web-design-4" role = "tab" data-toggle = "tab">Менеджмент</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#web-design-5" class = "b-tabs__link" aria-controls = "web-design-5" role = "tab" data-toggle = "tab">Копирайт</a>
                                        </div>
                                        <div class = "col-lg-4 col-md-6">
                                            <a href = "#web-design-6" class = "b-tabs__link" aria-controls = "web-design-6" role = "tab" data-toggle = "tab">Перевод</a>
                                        </div>
                                    </div>

                                    <div class = "b-tabs__content tab-content">
                                        <div class = "tab-pane fade in active" role = "tabpanel" id = "web-design-1">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "web-design-2">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "web-design-3">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "web-design-4">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "web-design-5">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "tab-pane fade" role = "tabpanel" id = "web-design-6">
                                            <div class = "row">
                                                <div class = "col-lg-3 col-sm-6">
                                                    <div class = "b-card b-company-structure__cards">
                                                        <img class = "b-card__logo" src = "images/b-card/1.jpg" alt = "logo">
                                                        <div class = "b-card__name">Анастасия Константинова</div>
                                                        <div class = "b-card__post">Проект-менеджер</div>
                                                        <div class = "b-card__footer">
                                                            <a href = "tel:000000000000" class = "b-card__phone">00 (000) 00 00 000</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href = "#" class = "b-tabs__link-more">
                                        <span class = "b-more b-more_icon-bottom">
                                            <span class = "b-more__text">Все сотрудники</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--end b-user -->



            <!--begin b-company-evaluation -->
            <div class = "b-company-evaluation b-block">
                <div class = "b-title">
                    Оценки компании
                </div>

                <div class = "b-company-evaluation__container clearfix">
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class = "col-sm-6 col-xs-12 b-company-evaluation__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-company-evaluation__img">
                                <img src = "images/b-company-evaluation/business-woman-photos.jpg" alt = "img">
                            </div>
                            <div class = "b-text-rows__main b-company-evaluation__main">
                                <div class = "b-company-evaluation__name">Ольга Иванова</div>
                                <div class = "b-company-evaluation__post">ИТ-директор</div>
                                <ul class = "b-company-evaluation__marks-list">
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Работа</span>
                                        <span class = "b-list__numbs">9.6</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Бизнес</span>
                                        <span class = "b-list__numbs">7.9</span>
                                    </li>
                                    <li class = "b-list b-list_dotted">
                                        <span class = "b-list__name">Персональная</span>
                                        <span class = "b-list__numbs">8.1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>


                <div class = "b-company-evaluation__container">
                    <a href = "#" class = "b-company-evaluation__link-more">
                        <span class = "b-more b-more_icon-right">
                            <span class = "b-more__text">Все оценки</span>
                        </span>
                    </a>
                </div>
            </div>
            <!--end b-company-trusted -->

        </div>
        <!--end b-content -->

        <!--begin b-sidebar -->
        <aside class = "b-sidebar">

            <!--begin b-last-marks -->
            <div class = "b-list-rating b-block">
                <div class = "b-title">Рейтинг сотрудников</div>
                <div class = "b-list-rating__container">

                    <div class = "b-list-rating__item">
                        <div class = "b-text-rows">
                            <div class = "b-text-rows__aside-left b-list-rating__logo">
                                <img src = "images/b-card/1.jpg" alt = "Название">
                            </div>

                            <div class = "b-text-rows__main b-list-rating__main">
                                <div class = "b-list-rating__name">Ольга<br> Иванова</div>
                                <div class = "b-list-rating__post">ИТ-директор</div>
                                <div class = "b-list-rating__stats">
                                    <ul class = "b-stats">
                                        <li class = "b-stats__item">
                                            <i class = "b-stats__icon b-stats__icon_users"></i>
                                            <span class = "b-stats__numbs">1</span>
                                        </li>
                                        <li class = "b-stats__item">
                                            <i class = "b-stats__icon b-stats__icon_diagram"></i>
                                            <span class = "b-stats__numbs">2</span>
                                        </li>
                                        <li class = "b-stats__item">
                                            <i class = "b-stats__icon b-stats__icon_comments"></i>
                                            <span class = "b-stats__numbs">5</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class = "b-text-rows__aside-right b-list-rating__score">
                                <div class = "b-list-rating__label">Рейтинг:</div>
                                <div class = "b-list-rating__numbs">8.7</div>
                            </div>
                        </div>
                    </div>

                </div>

                <a href = "#" class = "b-list-rating__link-more">
                    <span class = "b-more b-more_icon-right">
                        <span class = "b-more__text">Весь рейтинг</span>
                    </span>
                </a>
            </div>
            <!--end b-last-marks -->

        </aside>
        <!--end b-sidebar -->

    </div>
</div>


