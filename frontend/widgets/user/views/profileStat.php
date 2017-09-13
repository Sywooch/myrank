<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use frontend\models\UserNotification;
use yii\helpers\Url;

$contr = $model->isCompany ? 'company' : 'users';
?>
<div class="b-user__stats">
    <div class="b-user__stats__item">
        <div class="b-user__stats__item__content">
            <a href="<?= Url::toRoute(["$contr/alltrustees", 'id' => $model->id]) ?>">
                <div class="b-user__stats__item__icon b-user__stats__item__icon_1"></div>
                <div class="b-user__stats__item__text">
                    <?= \Yii::t('app', 'TRUSTED_WHOM'); ?>:
                </div>
                <div class="b-user__stats__item__number">
                    <?= $model->getUserTrusteesBack()->count() ?>
                </div>
                <?php $count = !$model->owner ? 0 : Yii::$app->notification->getNotif(UserNotification::NOTIF_TYPE_TRUSTEES); ?>
                <?php if ($count > 0) { ?>
                    <div class="b-user__stats__item__new-number">
                        <?= $count ?>
                    </div>
                <?php } ?>
            </a>
        </div>
    </div>
    <div class="b-user__stats__item">
        <div class="b-user__stats__item__content">
            <a href="<?= Url::toRoute(["$contr/allmarks", 'id' => $model->id]) ?>">
                <div class="b-user__stats__item__icon b-user__stats__item__icon_2"></div>
                <div class="b-user__stats__item__text"><?= \Yii::t('app', 'MARKS_WHOM'); ?>:</div>
                <div class="b-user__stats__item__number"><?= $model->getUserMarksTo()->count(); ?></div>
                <?php $count = !$model->owner ? 0 : Yii::$app->notification->getNotif(UserNotification::NOTIF_TYPE_MARKS) ?>
                <?php if ($count > 0) { ?>
                    <div class="b-user__stats__item__new-number">
                        <?= $count ?>
                    </div>
                <?php } ?>
            </a>
        </div>
    </div>
    <div class="b-user__stats__item">
        <div class="b-user__stats__item__content">
            <a href="<?= Url::toRoute(["$contr/alltestimonials", 'id' => $model->id]) ?>">
                <div class="b-user__stats__item__icon b-user__stats__item__icon_3"></div>
                <div class="b-user__stats__item__text">
                    <?= \Yii::t('app', 'REVIEWS_WHOM'); ?>:
                </div>
                <div class="b-user__stats__item__number">
                    <?= $model->getTestimonialsActive()->andWhere(['parent_id' => 0])->count() ?>
                </div>
                <?php $count = !$model->owner ? 0 : Yii::$app->notification->getNotif(UserNotification::NOTIF_TYPE_TESTIMONIALS) ?>
                <?php if ($count > 0) { ?>
                    <div class="b-user__stats__item__new-number">
                        <?= $count ?>
                    </div>
                <?php } ?>
            </a>
        </div>
    </div>
</div>


