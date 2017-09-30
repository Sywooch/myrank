<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="b-last-users">
    <div class="container">
        <h2><?= \Yii::t('app','LAST_ADDED_USERS'); ?></h2>
	<!-- div class="b-last-users__text">
        <?= \Yii::t('app','TOP_USERS_WITH_HIGHEST_RATING'); ?>
	</div -->
	<div class="b-last-users__carousel owl-carousel owl-theme">
	    <?php foreach ($model as $item) { ?>
	    <div class="item">
		<div class="b-last-users__item">
		    <div class="b-last-users__item__header">
			<div class="b-last-users__item__image">
                            <?= Html::a(Html::img($item->imageName), $item->profileLink) ?>
			</div>
		    </div>
		    <div class="b-last-users__item__content">
			<div class="b-last-users__item__title">
			    <?= Html::a($item->fullName, $item->profileLink) ?>
			</div>
			<div class="b-last-users__item__text">
			    <?= $item->position ?>
			</div>
		    </div>
		</div>
	    </div>
	    <?php } ?>
	</div>
    </div>
</div>