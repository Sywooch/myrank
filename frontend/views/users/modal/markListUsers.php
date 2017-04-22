<?php

use yii\helpers\Url;
use yii\helpers\Json;

?>
<div class="b-modal__header">
    <?= $title ?>
</div>
<div class="b-modal__content">
	<?php foreach ($model as $item) { ?>
        <div class="b-last-marks">
            <div class="b-last-marks__content">
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
                        <div class="row">
			    <?php
			    $summMarks = 0;
			    foreach ($item->descrArr as $item2) {
				$summMarks += $item2;
			    }
			    ?>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="b-last-marks__item__category">
                                    Средняя оценка:
                                </div>
                                <div class="b-last-marks__item__value">
                                    <?= round($summMarks / count($item->descrArr), 1) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
</div>