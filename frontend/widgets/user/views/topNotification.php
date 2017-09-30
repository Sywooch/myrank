<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;
//use frontend\models\UserNotification;
?>
<?php 
$trustClone = clone $trust; 
$count = $trustClone
        //->andWhere(['seen' => 0])
        ->count();
?>
<div class="b-header__user__stats clearfix">
    <div 
        class="b-header__user__stats__item b-header__user__stats__item_trusted clearfix" 
        id="notifTrustees" title="<?= Yii::t('app', 'TRUSTEES') ?>">
        <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_1"></div>
        <span class="notifCount"><?= $count ?></span>
        <?php if($count != 0) { ?>
        <div class="b-tooltip">
            <div class="b-tooltip__inner">
                <?= $this->render('topNotification/trustees', ['model' => $trust->all()]) ?>
            </div>
        </div>
        <?php } ?>
    </div>

    <?php 
    $marksClone = clone $marks; 
    $count = $marksClone
            //->andWhere(['seen' => 0])
            ->count();
    ?>
    <div class="b-header__user__stats__item b-header__user__stats__item_evaluation clearfix" 
         id="notifMarks" title="<?= Yii::t('app', 'MARKS') ?>">
        <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_2"></div>
        <span class="notifCount"><?= $count ?></span>
        <?php if($count != 0) { ?>
        <div class="b-tooltip">
            <div class="b-tooltip__inner">
                <?= $this->render('topNotification/marks', ['model' => $marks->all()]); ?>
            </div>
        </div>
        <?php } ?>
    </div>

    <?php 
    $testimonialsClone = clone $testimonials; 
    $count = $testimonialsClone
            //->andWhere(['seen' => 0])
            ->count();
    ?>
    <div class="b-header__user__stats__item clearfix" 
         id="notifTestimonials" title="<?= Yii::t('app', 'TESTIMONIALS') ?>">
        <div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_3"></div>
        <span class="notifCount"><?= $count ?></span>
        <?php if($count != 0) { ?>
        <div class="b-tooltip">
            <div class="b-tooltip__inner">
                <?= $this->render('topNotification/testimonials', ['model' => $testimonials->all()]) ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php
$url = Url::toRoute(['site/notifseen']);
$urlCheck = Url::toRoute(['site/notifcheck']);

$objUrl = $mObj->isCompany ? 'company' : 'users';
$notifTrustees = Url::toRoute(["$objUrl/alltrustees", 'id' => $mObj->id]);
$notifMarks = Url::toRoute(["$objUrl/allmarks", 'id' => $mObj->id]);
$notifTestimonials = Url::toRoute(["$objUrl/alltestimonials", 'id' => $mObj->id]);

$this->registerJs("
    var notifTrust = '#notifTrustees';
    var notifMarks = '#notifMarks';
    var notifTestim = '#notifTestimonials';
    
    $(notifTrust).on('click', function () {
        document.location.href = '".$notifTrustees."';
    });
    
    $(notifMarks).on('click', function () {
        document.location.href = '".$notifMarks."';
    });
    
    $(notifTestim).on('click', function () {
        document.location.href = '".$notifTestimonials."';
    });

    $('body').on('mouseover', '.b-tooltip__item_unread', function() {
        id = $(this).attr('data-id');
        type = $(this).attr('data-type');
        
        getQuery(id, type);
        
        $(this).removeClass('b-tooltip__item_unread');
        $(this).find('.b-small-message__member-status_online').remove();
    });
    
    setInterval(function() {
        checkNotifAct($(notifTrust));
        checkNotifAct($(notifMarks));
        checkNotifAct($(notifTestim));
    }, 500);
    
    setInterval(function () {
        obj = getViewNotif();
        obj['_csrf-frontend'] = $('[name=\"csrf-token\"]').attr('content')
        $.post('$urlCheck', obj, function (out) {
            if(out.code == 1) {
                $.each(out.data, function(i, val) {
                    switch (i) {
                        case 'trustees':
                            count = parseInt($('#notifTrustees .notifCount').text());
                            if(count < val.count) {
                                if($('#notifTrustees .b-tooltip__inner').length == 0) {
                                    $('#notifTrustees').prepend('<div class=\"b-tooltip\"><div class=\"b-tooltip__inner\"></div></div>');
                                }
                                $('#notifTrustees .b-tooltip__inner').prepend(val.data);
                            }
                            break;
                        case 'marks':
                            count = parseInt($('#notifMarks .notifCount').text());
                            if(count < val.count) {
                                if($('#notifMarks .b-tooltip__inner').length == 0) {
                                    $('#notifMarks').prepend('<div class=\"b-tooltip\"><div class=\"b-tooltip__inner\"></div></div>');
                                }
                                $('#notifMarks .b-tooltip__inner').prepend(val.data);
                            }
                            break;
                        case 'testimonials':
                            count = parseInt($('#notifTestimonials .notifCount').text());
                            if(count < val.count) {
                                if($('#notifTestimonials .b-tooltip__inner').length == 0) {
                                    $('#notifTestimonials').prepend('<div class=\"b-tooltip\"><div class=\"b-tooltip__inner\"></div></div>');
                                }
                                $('#notifTestimonials .b-tooltip__inner').prepend(val.data);
                            }
                            break;
                    }
                    //console.log(i);
                });
                //console.log(out.data);
            }
        }, 'json');
    }, 5000);
    
    function getViewNotif () {
        var obj = {}; 
        $(notifTrust).find('.b-tooltip__item').each(function(i, val) {
            obj['trust[' + i + ']'] = $(val).attr('data-id');
        });
        $(notifMarks).find('.b-tooltip__item').each(function(i, val) {
            obj['marks[' + i + ']'] = $(val).attr('data-id');
        });
        $(notifTestim).find('.b-tooltip__item').each(function(i, val) {
            obj['testim[' + i + ']'] = $(val).attr('data-id');
        });
        return obj;
    }
    
    function getQuery (id, type) {
        $.get('$url', {id:id, type:type});
    }

    function checkNotifAct (that) {
        count = that.find('.b-tooltip__item_unread').length;
        countPres = parseInt(that.find('.notifCount').text());
        
        if(count != countPres) {
            that.find('.notifCount').text(count + countPres);
            that.addClass('active');
        }
        if(count == 0) {
            $(that).removeClass('active');
        }
    }", \yii\web\View::POS_END);
?>