<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

use frontend\models\UserCompany;
use yii\helpers\Url;
?>

<div class="b-title b-title_grey">
    <?= $title ?>: <?= count($model) ?>
</div>
<div class="b-company-trusted__container clearfix">
    <?php foreach ($model as $item) { ?>
        <div class="col-lg-3 col-sm-6 persItem" style="width: 20%;">
            <div class="b-small-date">
                <?= Yii::$app->formatter->asDate($item->created, 'dd.MM.yyyy H:m') ?>
            </div>
            <div class="b-card <?= !$item->status ? 'b-card_new' : "" ?> b-company-trusted__item">
                <div style="height:186px; display: table-cell; vertical-align: middle; overflow: hidden">
                    <div style="overflow:hidden; max-height: 186px;">
                        <?=
                        yii\helpers\Html::img($item->obj->imageName, [
                            'class' => 'b-card__logo',
                            'alt' => $item->user->fullName,
                        ])
                        ?>
                    </div>
                </div>
                <div class="b-card__name" style="height: 40px;">
                    <?= \yii\helpers\Html::a($item->user->fullName, $item->user->profileLink) ?></div>
                <div class="b-card__post">
                    <?= $item->status == UserCompany::STATUS_REQUEST ? yii\helpers\Html::textInput("company_post", "", [
                        'class' => 'inputText', 
                        'placeholder' => $item->company_post,
                        'id' => 'companyPost'.$item->id,
                    ]) : $item->company_post ?>
                </div>
                <div class="actions" data-id="<?= $item->id ?>">
                    <?php if ($item->status == UserCompany::STATUS_REQUEST) { ?>
                        <a class="button-small b-card__button action_but" href="#" data-id="<?= UserCompany::ACTION_BUT_CONFIRM ?>">Подтвердить</a>
                        <div><a href="#" class="b-link action_but" data-id="<?= UserCompany::ACTION_BUT_REFUSE ?>">Отказать</a></div>
                    <?php } else { ?>
                        <div><a href="#" class="b-link b-link_red action_but remove" data-id="<?= UserCompany::ACTION_BUT_REMOVE ?>">Удалить</a></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php

$this->registerJs("
    $(document).on('click', '.action_but', function () {
        var that = $(this);
        var actId = that.attr('data-id');
        var id = that.closest('.actions').attr('data-id');
        companyPost = $('#companyPost' + id);
        if(companyPost.val() == '') {
            var post = companyPost.attr('placeholder');
        } else {
            var post = $('#companyPost' + id).val();
        }
        $.post('$url', {'actid':actId, 'id':id, 'post':post, '_csrf-frontend': $('[name=\'csrf-token\']').attr('content')}, function (out) {
            if(out.code == 1) {
                switch(actId) {
                    case '".UserCompany::ACTION_BUT_CONFIRM."':
                        that.closest('.b-company-trusted__item').removeClass('b-card_new');
                        that.closest('.actions').html(out.data);
                        $('#companyPost' + id).closest('div').text(post);
                        break;
                    case '".UserCompany::ACTION_BUT_REFUSE."':
                    case '".UserCompany::ACTION_BUT_REMOVE."':
                        that.closest('.persItem').hide('slow', function() {that.remove();});
                        break;
                }
            }
        }, 'json');
        return false;
    });");
?>