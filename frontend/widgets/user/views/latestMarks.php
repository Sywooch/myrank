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
			$summMarks = 0;
			foreach ($item->descrArr as $item2) {
			    $summMarks += $item2;
			}
			?>
			<div class="b-last-marks__item__category">
			    Средняя оценка:
			</div>
			<div class="b-last-marks__item__value">
			    <?= round($summMarks / count($item->descrArr), 1) ?>
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