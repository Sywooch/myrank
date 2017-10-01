<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use frontend\models\UserNotification;
use frontend\models\UserTrustees;
?>

<?php foreach ($model as $item) { ?>
    <div 
        class="b-text-image b-small-message b-tooltip__item <?= $item->seen ?: 'b-tooltip__item_unread' ?>"
        data-id="<?= $item->id ?>"
        data-type="<?= UserNotification::NOTIF_TYPE_TRUSTEES ?>">
        <div class="b-text-image__img">
            <div class="b-small-message__img">
                <img src="<?= $item->userFrom->imageName ?>" alt="">
            </div>
        </div>
        <div class="b-text-image__text">
            <div class="b-small-message__content">
                <div class="b-small-message__name"><?= $item->userFrom->fullName ?></div>
                <div class="b-small-message__post">
                    <?= isset($item->userFrom->objUserCompany->company_post) ? $item->userFrom->objUserCompany->company_post : "" ?>
                </div>
                <div class="b-small-message__date">
                    <?= date("Y.m.d H:i:s", strtotime($item->created)); ?>
                </div>
            </div>
        </div>
        <?php if($item->status == UserTrustees::STATUS_REQUEST) { ?>
        <div class="b-text-image__text center actions">
            <a class="button-extrasmall b-tooltip__button-send addTrustUser" href="#">Ок</a>
            <a href="#" class="b-link b-link_red removeTrustUser">Удалить</a>
        </div>
        <?php } ?>
        <div 
            class="b-small-message__member-status b-small-message__member-status_online"
            style="<?= !$item->seen ?: 'display:none;' ?>"></div>
    </div>
    <?php
} /* ?>

<!-- a class="b-tooltip__more-link" href="#">
    <span class="b-more b-more_icon-down">
        <span class="b-more__text">Больше</span>
    </span>
</a -->
 * 
 */