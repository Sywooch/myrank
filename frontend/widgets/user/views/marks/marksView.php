<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\UserConstant;
use frontend\models\Testimonials;

//var_dump($allList);
if(isset($allList[0]) && (count($allList[0]) > 0)) {
?>
    <div class="b-marks b-block">
        <form id="markFields" method="POST" action="#">
            <div class="b-title">
                <?= $title ?>
                <?php if(!$model->owner) { ?>
                    <?= Html::dropDownList("whoFromTo", isset($list['whofromto']) ? $list['whofromto'] : 0, Testimonials::whoFromTo(), ['style' => 'float:right; width: auto', 'class' => 'form-control']); ?>
                <?php } ?>
            </div> 
            <?php if(Yii::$app->user->id === NULL) { ?>
            <div class="row">
                <div class="col-md-12"><?= Yii::t('app', 'MARKS_PRE_MESSAGE') ?></div>
            </div>
            <?php } ?>
            <div class="b-marks__content">
                <?php foreach (isset($allList[0]) ? $allList[0] : [] as $key => $el) { ?>
                    <?php if (isset($allList[$key]) && count($allList[$key]) > 0) { ?>
                        <div class="b-marks__item">
                            <div class="b-marks__item__header">
                                <div class="b-marks__item__header__text">
                                    <div class="b-marks__item__header__icon"></div>
                                    <span><?= $el ?></span>
                                </div>
                                <div class="b-marks__item__header__line"></div>
                                <div id="summField<?= $key ?>" class="b-marks__item__header__number">0.0</div>
                                <input id="summInput<?= $key ?>" type="hidden" name="mark[0][<?= $key ?>]" value="0.0" />
                            </div>
                            <div class="b-marks__item__content" data-summ="<?= $key ?>">
                                <?= $this->render('marksView_sub', ['allList' => $allList, 'list' => $list, 'key' => $key]); ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        //echo 'Hz';
                    }
                }
                ?>
                <?= Html::hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
            </div>
        </form>
        <div class="b-marks__button">
            <?php if ($model->owner) { ?>
                <a class="button-small showModal" 
                   data-url="<?= Url::toRoute(['users/configmarks']) ?>" 
                   href="#"><?= \Yii::t('app', 'CONFIGURE'); ?></a>
               <?php } ?>
               <?php if (Yii::$app->user->id !== NULL) { ?>
                <a id="saveMarks" class="button-small" href="#"><?= \Yii::t('app', 'RATING_SAVE'); ?></a>
            <?php } ?>
        </div>

    </div>
    <?php
    $saveMarks = Url::toRoute([
                "users/savemarks",
                'id' => $model->id,
                'typeTo' => $model->isCompany ? UserConstant::TYPE_USER_COMPANY : UserConstant::TYPE_USER_USER
            ]);
    $script = "
        $(document).ready(function () {
            $('.summField').on('keypress, change, keyup', function () {
                val = $(this).val();
                if((val > 10) || (val < 0)) {
                    $(this).val(0);
                    changeField();
                }
            });
            $('.summField').on('focus', function() {
                $(this).val('');
            });

            $('.summField').on('blur', function () {
                $(this).val($(this).attr('data-def'));
            });

            changeField();

            $('.marks-slider').slider({
                change: function () {
                    changeField();
                }
            });

            function changeField () {
                $('.b-marks__item__content').each(function(i, elem) {
                    var out = 0;
                    var count = 0;
                    var res = 0;
                    $(elem).find('.summField').each(function(j, elem2) {
                        $(elem2).attr('data-def', $(elem2).val());
                        if($(elem2).val() != '0.0') {
                            count++;
                            val = parseFloat($(elem2).val());
                            out += val;

                            block = $(elem2).closest('.b-marks__item__content__row').find('.b-marks__item__content__like');
                            likeDown = block.hasClass('b-marks__item__content__like_down');
                            if ((val < 5.0) && val > 0) {
                                if (!likeDown) {
                                    block.removeClass('b-marks__item__content__like_up').addClass('b-marks__item__content__like_down');
                                }
                                block.show();
                            } else if(val > 4.9) {
                                if (likeDown) {
                                    block.removeClass('b-marks__item__content__like_down').addClass('b-marks__item__content__like_up');
                                }
                                block.show();
                            } else {
                                block.hide();
                            }
                        } else {
                            out += 0.0;
                        }
                    });
                    if(count != 0) { 
                        res = out / count;
                    }
                    id = $(elem).attr('data-summ');
                    $('#summField' + id).text(res.toFixed(1));
                    $('#summInput' + id).val(res.toFixed(1));
                });
            }";
    if (Yii::$app->user->id !== Null) {
        $script .= "$('#saveMarks').on('click', function() {
                    $(this).parents('.b-marks').addClass('b-marks_loading');
                    $.ajax({
                        'url' : '" . $saveMarks . "',
                        'method': 'POST',
                        'data' : $('#markFields').serialize(),
                        'dataType' : 'json',
                        'success' : function(out) {
                            if(out.code === 1) {
                                $('#saveMarks').parents('.b-marks').removeClass('b-marks_loading');
                                location.reload(true);
                                //alertInfo('Ваша оценка сохранена');
                            }
                        }
                    });
                    return false;
                });";
        $script .= "$('#configMarks').on('click', function () {

                })
            ";
    } else {
        $script .= "$('#saveMarks').on('click', function() {
                        alertRed('" . \Yii::t('app', 'ENTER_TO_LEAVE_MARKS_FOR_USERS') . "');
                    return false;
                });";
    }
    $script .= "});";
    $this->registerJs($script, \yii\web\View::POS_END);
}
?>
