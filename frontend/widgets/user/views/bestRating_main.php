<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="b-rating">
    <div class="container">
	<h2><?= $title ?></h2>
	<div class="b-rating__header">
	    <div class="b-rating__header__text"><?= \Yii::t('app','BEST_RATING_TEXT'); ?></div>
	    <div class="b-rating__header__link">
		<!-- a href="#"><?= \Yii::t('app','ALL_CATEGORIES'); ?></a -->
	    </div>
	</div>
	<div class="b-rating__content">
	    <?php foreach ($model as $item) { ?>
	    <div class="b-rating__col">
		<div class="b-rating__item">
		    <div class="b-rating__item__header">
			<div class="b-rating__item__image">
			    <img src="<?= $item->imageName ?>" alt="">
			    <div class="b-rating__item__info">
				<ul>
				    <?php foreach ($item->getProfileProfession()->limit(3)->all() as $item2) { ?>
				    <li><?= $item2->title ?></li>
				    <?php } ?>
				</ul>
				<!-- div class="b-rating__item__likes">
				    10
				</div>
				<div class="b-rating__item__messages">
				    12
				</div -->
			    </div>
			    <div class="b-rating__item__number"><?= $item->rating ?></div>
			</div>
		    </div>
		    <div class="b-rating__item__content">
			<div class="b-rating__item__title">
                            <?= Html::a($item->fullName, $item->profileLink) ?>
			</div>
                        <div class="b-rating__item__text"><?= isset($item->objUserCompany->company_post) ? $item->objUserCompany->company_post : "" ?></div>
		    </div>
		</div>
	    </div>
	    <?php } ?>
	</div>
    </div>
</div>
<style type="text/css">
    .b-rating__item:hover .b-rating__item__content a,
    .b-rating__item__title a:hover {color: #ffffff;}
</style>