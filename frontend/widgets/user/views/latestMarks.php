<?php

use yii\helpers\Url;
use frontend\models\UserMarks;

if (count($list) > 0) {
    ?>
    <div class="b-last-marks b-block">
        <div class="b-title"><?= \Yii::t('app','LATEST_RATINGS'); ?></div>
        <div class="b-last-marks__content">
	    <?php foreach ($list as $item) { ?>
		<div class="b-last-marks__item">
		    <div class="b-last-marks__item__image">
			<img src="<?= $item->user->userImage ?>" alt="">
		    </div>
		    <div class="b-last-marks__item__content">
			<div class="b-last-marks__item__name">
			    <a href="<?= Url::toRoute(['users/profile', 'id' => $item->user->id]) ?>">
				<?= $item->user->fullName ?>
			    </a>
			</div>
			<div class="b-last-marks__item__date">
			    <?= Yii::$app->formatter->asDate($item->created, 'dd.MM.yyyy') ?>
			</div>
			<?php
			$summMarks = 0;
			$count = 0;
			foreach ($item->descrArr as $item2) {
			    if($item2 != 0.0) {
				$count++;
				$summMarks += $item2;
			    }
			}
			?>
			<div class="b-last-marks__item__category">
                <?= \Yii::t('app','RATING_AVERAGE'); ?>:
			</div>
			<div class="b-last-marks__item__value showModal" data-url="<?= Url::toRoute(['users/markview', 'id' => $item->id]) ?>" style="cursor: pointer">
			    <?php if(($count != 0) && ($summMarks != 0)) {
				echo round($summMarks / $count, 1);
			    } else {
				echo "0.0";
			    } ?>
			</div>
		    </div>
		</div>
	    <?php } ?>
	    <?php if ($count > UserMarks::COUNT_LIST_USER_PROFILE) { ?>
		<div class="link">
		    <a href="#" class="showModal" data-url="<?= Url::toRoute(['users/lastmarksuser', 'id' => $model->id]) ?>">
			<span><?= \Yii::t('app','VIEW_ALL'); ?></span>
		    </a>
		</div>
	    <?php } ?>
        </div>
    </div>
<?php } ?>
