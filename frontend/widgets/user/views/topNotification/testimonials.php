<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use frontend\models\UserNotification;
?>

<?php
foreach ($model as $item) {
    $string = substr($item->text, 0, 200);
    $string = strlen($item->text) > 200 ? substr($string, 0, strrpos($string, ' ')) . "..." : $string;
    ?>
    <div 
        class="b-text-image b-small-message b-tooltip__item <?= $item->seen ?: 'b-tooltip__item_unread' ?>"
        data-id="<?= $item->id ?>"
        data-type="<?= UserNotification::NOTIF_TYPE_TESTIMONIALS ?>">
        <div class="b-text-image__img">
            <div class="b-small-message__img">
                <img src="<?= $item->userFrom->imageName ?>" alt="">
                <div class="b-small-message__number"><?= $item->userFrom->rating ?></div>
            </div>
        </div>
        <div class="b-text-image__text">
            <div class="b-small-message__content">
                <div class="b-small-message__header">
                    <div class="b-small-message__name"><?= $item->userFrom->fullName ?></div>
                    <div class="b-small-message__date"><?= date("Y.m.d H:i:s", strtotime($item->created)); ?></div>
                    <div class="b-small-message__smile <?= $item::$smilesSmall[$item->smile] ?>"></div>
                </div>
                <div class="b-small-message__body">
                    <!-- div class="b-small-message__caption">Отличный работник!</div -->
                    <div class="b-small-message__text"><?= $string ?></div>
                </div>
            </div>
        </div>
        <div 
            class="b-small-message__member-status b-small-message__member-status_online" 
            style="<?= !$item->seen ?: 'display:none;' ?>"></div>
    </div>
<?php } /* ?>

<!-- a class="b-tooltip__more-link" href="#">
    <span class="b-more b-more_icon-down">
        <span class="b-more__text">Больше</span>
    </span>
</a -->
 * 
 */