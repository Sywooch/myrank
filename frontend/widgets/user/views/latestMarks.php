<?php

use yii\helpers\Url;

if (count($list) > 0) {
    ?>
    <div class="b-last-marks b-block">
        <div class="b-title">Последние оценки</div>
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
			$marksKey = array_keys($marks);
			$markIndex = $marksKey[rand(0, count($marks) - 1)];
			?>
			<div class="b-last-marks__item__category">
			    <?= $marks[$markIndex] ?>:
			</div>
			<div class="b-last-marks__item__value">
			    <?= $item->descrArr[$markIndex] ?>
			</div>
		    </div>
		</div>
	    <?php } ?>
    	<div class="link">
	    <a href="#" class="showModal" data-url="<?= Url::toRoute(['users/lastmarksuser', 'id' => $model->id]) ?>">
		<span>Посмотреть всех</span>
	    </a>
    	</div>
        </div>
    </div>
<?php } ?>