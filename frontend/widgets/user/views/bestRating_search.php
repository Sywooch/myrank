<div class="b-trusted-users b-block">
    <div class="b-title"><?= \Yii::t('app','BEST_RATING'); ?></div>
    <div class="b-trusted-users__content">
	<?php foreach ($model as $item) { ?>
	<div class="b-trusted-users__item" <?= count($item->userProfession) == 0 ? 'style="height: 110px"' : ""?>>
    	    <div class="b-trusted-users__item__image" style="position: relative;">
		<img src="<?= $item->userImage ?>" alt="">
		<div class="b-rating__item__number" style="padding: 0 6px; line-height: 25px;"><?= $item->rating ?></div>
	    </div>
    	    <div class="b-trusted-users__item__content">
    		<div class="b-trusted-users__item__name">
		    <a href="<?= \yii\helpers\Url::toRoute(['users/profile', 'id' => $item->id]) ?>"><?= $item->fullName ?></a>
		</div>
    		<div class="b-trusted-users__item__place"><?= $item->position ?></div>
    		<div class="b-tags">
			<?php foreach ($item->userProfession as $item2) { ?>
			    <span><?= $item2->title ?></span>
			<?php } ?>
    		</div>
    	    </div>
    	</div>
	<?php } ?>
	<!-- div class="link">
	    <a href="#"><span>Посмотреть всех</span></a>
	</div -->
    </div>
</div>