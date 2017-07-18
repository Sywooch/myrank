<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Html;
?>
<div class="b-user b-block">
    <div class="b-company-trusted">
        <div class="b-title b-title_grey">
            Доверенные компании
        </div>

        <div class="b-company-trusted__container clearfix">
            <?php foreach ($list as $item) { ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="b-small-date">
                        <?= Yii::$app->formatter->asDate($item->created, 'dd.MM.yyyy H:m:s') ?>
                    </div>
                    <div class="b-card b-company-trusted__item <?= 'b-card_new' ?>">
                        <div class="b-card__logo-block">
                            <img class="b-card__logo" src="<?= $item->user->imageName ?>" alt="logo">
                        </div>
                        <div class="b-card__name" style="height: 40px;">
                            <?= Html::a($item->user->fullName, $item->user->profileLink) ?>
                        </div>
                        <!-- div class="b-card__post">Проект-менеджер</div -->
                        <?php if(1) { ?>
                            <a class="button-small b-card__button" href="#">Подтвердить</a>
                            <div><a href="#" class="b-link">Отказать</a></div>
                        <?php } else { ?>
                            <div><a href="#" class="b-link b-link_red">Удалить</a></div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
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


