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
                            <?= $item->user->position ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
</div>