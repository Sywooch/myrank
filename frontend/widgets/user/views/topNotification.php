<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
?>
<div class="b-header__user__stats clearfix">
    <div class="b-header__user__stats__item b-header__user__stats__item_trusted clearfix active" id="notifTrustees">
        <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_1"></div>
        <?php $trustClone = clone $trust; ?>
        <span class="notifCount"><?= $trustClone->andWhere(['seen' => 0])->count(); ?></span>

        <div class="b-tooltip">
            <div class="b-tooltip__inner">
                <?php foreach ($trust->all() as $item) { ?>
                <div class="b-text-image b-small-message b-tooltip__item <?= $item->seen ?: 'b-tooltip__item_unread' ?>">
                    <div class="b-text-image__img">
                        <div class="b-small-message__img">
                            <img src="<?= $item->userFrom->imageName ?>" alt="">
                        </div>
                    </div>
                    <div class="b-text-image__text">
                        <div class="b-small-message__content">
                            <div class="b-small-message__name"><?= $item->userFrom->fullName ?></div>
                            <div class="b-small-message__post">
                                <?= isset($item->userFrom->objUserCompany->company_post) ? $item->user->objUserCompany->company_post : "" ?>
                            </div>
                            <div class="b-small-message__date">
                                <?= date("Y.m.d H:i:s", strtotime($item->created)); ?>
                            </div>
                        </div>
                    </div>
                    <?php if($item->seen) { ?><div class="b-small-message__member-status b-small-message__member-status_online"></div><?php } ?>
                </div>
                <?php } ?>

                <!-- a class="b-tooltip__more-link" href="#">
                    <span class="b-more b-more_icon-down">
                        <span class="b-more__text">Больше</span>
                    </span>
                </a -->
            </div>
        </div>
    </div>

    <div class="b-header__user__stats__item b-header__user__stats__item_evaluation clearfix active" id="notifMarks">
        <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_2"></div>
        <?php $marksClone = clone $marks; ?>
        <span class="notifCount"><?= $marksClone->andWhere(['seen' => 0])->count() ?></span>
        <div class="b-tooltip">
            <div class="b-tooltip__inner">
                <?php foreach ($marks->all() as $item) { ?>
                <div class="b-text-image b-small-message b-tooltip__item <?= $item->seen ?: 'b-tooltip__item_unread' ?>">
                    <div class="b-text-image__img">
                        <div class="b-small-message__img">
                            <img src="<?= $item->user->imageName ?>" alt="women">
                        </div>
                    </div>
                    <div class="b-text-image__text">
                        <div class="b-small-message__content">
                            <div class="b-small-message__name"><?= $item->user->fullName ?></div>
                            <div class="b-small-message__post"><?= isset($item->userFrom->objUserCompany->company_post) ? $item->user->objUserCompany->company_post : "" ?></div>
                            <div class="b-small-message__date"><?= date("Y.m.d H:i:s", strtotime($item->created)); ?></div>
                        </div>
                    </div>
                    <div class="b-text-image__text">
                        <div class="b-small-message__rating">
                            <div class="b-small-message__rating-caption">Оценка:</div>
                            <div class="b-small-message__rating-numbs">0</div>
                        </div>
                    </div>
                    <?php if($item->seen) { ?><div class="b-small-message__member-status b-small-message__member-status_online"></div><?php } ?>
                </div>
                <?php } ?>
                <!-- a class="b-tooltip__more-link" href="#">
                    <span class="b-more b-more_icon-down">
                        <span class="b-more__text">Больше</span>
                    </span>
                </a -->
            </div>
        </div>
    </div>

    <div class="b-header__user__stats__item clearfix active" id="notifTestimonials">
        <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_3"></div>
        <?php $testimonialsClone = clone $testimonials; ?>
        <span class="notifCount"><?= $testimonialsClone->andWhere(['seen' => 0])->count() ?></span>
        <div class="b-tooltip">
            <div class="b-tooltip__inner">
                <?php foreach ($testimonials->all() as $item) { 
                    $string = substr($item->text, 0, 200);
                    ?>
                <div class="b-text-image b-small-message b-tooltip__item <?= $item->seen ?: 'b-tooltip__item_unread' ?>">
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
                                <div class="b-small-message__text"><?= $string//substr($string, 0, strrpos($string, ' ')); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php if($item->seen) { ?><div class="b-small-message__member-status b-small-message__member-status_online"></div><?php } ?>
                </div>
                <?php } ?>

                <!-- a class="b-tooltip__more-link" href="#">
                    <span class="b-more b-more_icon-down">
                        <span class="b-more__text">Больше</span>
                    </span>
                </a -->
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJs("
    $('body').on('mouseover', '.b-tooltip__item_unread', function() {
        $(this).removeClass('b-tooltip__item_unread');
        $(this).find('.b-small-message__member-status_online').remove();
    });
    
    setInterval(function() {
        checkNotifAct($('#notifTrustees'));
        checkNotifAct($('#notifMarks'));
        checkNotifAct($('#notifTestimonials'));
    }, 500);

    function checkNotifAct (that) {
        count = that.find('.b-tooltip__item_unread').length;
        countPres = parseInt(that.find('.notifCount').text());
        
        if(count != countPres) {
            that.find('.notifCount').text(count);
        }
        if(count == 0) {
            $(that).removeClass('active');
        }
    }", \yii\web\View::POS_END);
?>