<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
//use frontend\models\UserCompany;
use frontend\models\UserTrustees;
use yii\helpers\Url;

$url = Url::toRoute(['users/change-trustees-status']);
?>
<div class="b-user b-block">
    <div class="b-company-trusted">
        <div class="b-title b-title_grey"><?= $title ?></div>

        <div class="b-company-trusted__container clearfix">
            <?php foreach ($list as $item) { ?>
                <div class="col-lg-3 col-sm-6 persItem" style="width: 20%;">
                    <div class="b-small-date">
                        <?= Yii::$app->formatter->asDate($item->created, 'dd.MM.yyyy H:m') ?>
                    </div>
                    <div class="b-card <?= !$item->status ? 'b-card_new' : "" ?> b-company-trusted__item">
                        <div style="height:186px; display: table-cell; vertical-align: middle; overflow: hidden">
                            <div style="overflow:hidden; max-height: 186px;">
                                <?=
                                \yii\helpers\Html::img($item->obj->imageName, [
                                    'class' => 'b-card__logo',
                                    'alt' => $item->obj->fullName,
                                ])
                                ?>
                            </div>
                        </div>
                        <div class="b-card__name" style="height: 40px;">
                            <?= \yii\helpers\Html::a($item->obj->fullName, $item->obj->profileLink) ?></div>
                        <div class="b-card__post">
                            <?= "" //$item->userFrom->objUserCompany->company_post ?>
                        </div>
                        <?php if ($editable) : ?>
                        <div class="actions" data-id="<?= $item->id ?>">
                            <?php if ($item->status == UserTrustees::BACK_TRUSTEES_NO) { ?>
                                <a href="#" 
                                   class="button-small b-card__button action_but"
                                   data-id="<?= UserTrustees::STATUS_CONFIRM ?>"><?= Yii::t('app', 'CONFIRM') ?></a>
                                <div>
                                    <a href="#" 
                                        class="b-link action_but" 
                                        data-id="<?= UserTrustees::STATUS_REFUSE ?>"><?= Yii::t('app', 'REFUSE') ?></a>
                                </div>
                            <?php } else { ?>
                                <div>
                                    <a href="#" 
                                       class="b-link b-link_red action_but remove" 
                                       data-id="<?= UserTrustees::STATUS_REMOVE ?>"><?= Yii::t('app', 'REMOVE') ?></a></div>
                            <?php } ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php if($count == UserTrustees::COUNT_LIST_INFO) { ?>
        <div class="b-company-trusted__container">
            <a href="<?= Url::toRoute(['alltrustees']) ?>" class="b-company-trusted__link-more">
                <span class="b-more b-more_icon-right">
                    <span class="b-more__text"><?= Yii::t('app', 'ALL_TRUSTEES') ?></span>
                </span>
            </a>
        </div>
        <?php } ?>
    </div>
    <!-- end b-company-trusted -->
</div>

<?php
$this->registerJs("
    $(document).on('click', '.action_but', function () {
        var that = $(this);
        var actId = that.attr('data-id');
        var id = that.closest('.actions').attr('data-id');
        
        $.post('$url', {'actid':actId, 'id':id, '_csrf-frontend': $('[name=\'csrf-token\']').attr('content')}, function (out) {
            if(out.code == 1) {
                switch(actId) {
                    case '" . UserTrustees::STATUS_CONFIRM . "':
                        that.closest('.b-company-trusted__item').removeClass('b-card_new');
                        that.closest('.actions').html(out.data);
                        $('#companyPost' + id).closest('div').text(post);
                        break;
                    case '" . UserTrustees::STATUS_REFUSE . "':
                    case '" . UserTrustees::STATUS_REMOVE . "':
                        that.closest('.persItem').hide('slow', function() {that.remove();});
                        break;
                }
            }
        }, 'json');
        return false;
    });");
?>
