<?php

use frontend\models\Testimonials;
use yii\helpers\Url;
?>
<div class="b-comments b-block">
    <div class="b-title">
	Отзывы
	<?php if (!is_null(Yii::$app->user->id) && !$mUser->owner) { ?>
    	<a class="button-small" id="writeTestimonial" href="#"><?= \Yii::t('app','GIVE_FEEDBACK'); ?></a>
	<?php } ?>
    </div>
    <div class="b-comments__content">
	<?php if (count($list) > 0) { ?>
	    <?php foreach ($list as $key => $item) { ?>
		<div class="b-comments__item" data-id="<?= $item->id ?>" id="testimonials<?= $item->id ?>">
		    <div class="b-comments__item__image">
			<img src="<?= $item->userFrom->userImage ?>" alt="">
			<div class="b-comments__item__number">
			    <?= $item->userFrom->rating ?>
			</div>
		    </div>
		    <div class="b-comments__item__info">
			<div class="b-comments__item__date">
			    <?= Yii::$app->formatter->asDate($item->created, 'dd.MM.yyyy') ?>
			</div>
			<div class="b-comments__item__smile <?= Testimonials::$smiles[$item->smile] ?>"></div>
			<div class="b-comments__item__actions">
			    <?php if ($item->userTo->owner) { ?>
				<?php if (!isset($item->answer->id)) { ?><a class="answerTestimonial" href="#"><?= \Yii::t('app','REPLY'); ?></a><?php } ?>
	    		    <a class="claimTestimonial" href="#"><?= \Yii::t('app','COMPLAIN'); ?></a>
			    <?php } ?>
			</div>
		    </div>
		    <div class="b-comments__item__content">
			<!-- div class="b-comments__item__title">
			    Отличный работник!
			</div -->
			<div class="b-comments__item__name">
			    <a href="<?= Url::toRoute(['users/profile', 'id' => $item->user_from]) ?>"><?= $item->userFrom->fullName ?></a>
			</div>
			<!-- div class="b-comments__item__post">
			    Инженер
			</div -->
			<div class="b-comments__item__text">
			    <p><?= $item->text ?></p>
			</div>
			<?php if (isset($item->answer->id)) { ?>
	    		<div class="b-comments__item__answer">
	    		    <div class="b-comments__item__answer__image">
	    			<img src="<?= $item->answer->userFrom->userImage ?>" alt="">
	    		    </div>
	    		    <div class="b-comments__item__answer__text">
	    			<p><?= $item->answer->text ?></p>
	    		    </div>
	    		</div>
			<?php } ?>
		    </div>
		</div>
	    <?php } ?>

	    <?php if (count($list) > Testimonials::COUNT_LIST) { ?>
		<div class="b-comments__button-more">
		    <span class="b-comments__button-more__default"><?= \Yii::t('app','MORE'); ?></span>
		    <span class="b-comments__button-more__loading"></span>
		</div>
	    <?php } ?>
	<?php } else { 
	    $text = $mUser->owner ? \Yii::t('app','NO_REVIEWS') : \Yii::t('app','NO_REVIEWS_YOU_CAN_SHARE_USEFUL_INFORMATION_ABOUT_THIS_PERSON');
	    ?>
	<p><?= $text ?></p>
	<?php } ?>
    </div>
</div>
<?php
$this->registerJs("
	$('#writeTestimonial').on('click', function() {
	    url = '" . Url::toRoute(["users/writetestimonials", "id" => $mUser->id]) . "';
	    csrf = '" . Yii::$app->getRequest()->getCsrfToken() . "';
	    showModal(url, 1, 1); 
	    return false;
	});
	$('.claimTestimonial').on('click', function() {
	    id = $(this).closest('.b-comments__item').attr('data-id');
	    url = '" . Url::toRoute(["users/sendclaim"]) . "';
	    sendPost(url, id);
	    alertInfo('".\Yii::t('app','COMPLIANT_SUBMITTED')."');
	    return false;
	});
	$('.answerTestimonial').on('click', function() {
	    id = $(this).closest('.b-comments__item').attr('data-id');
	    url = '" . Url::toRoute(["users/writetestimonials", "id" => $mUser->id]) . "';
	    showModal(url, {'parent':id}, 1);
		
	    return false;
	});
	
	", \yii\web\View::POS_END);
?>