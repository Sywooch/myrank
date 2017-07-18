<?php

use yii\helpers\Url;
use yii\helpers\Json;

$markNames = $item->markNames;
?>
<div class="b-modal__header">
    <?= $title ?>
</div>
<div class="b-modal__content">
	
        <div class="b-last-marks">
            <div class="b-last-marks__content">
                <div class="b-last-marks__item">
                    <div class="b-last-marks__item__image">
                        <img src="<?= $item->user->imageName ?>" alt="">
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
			    <?php foreach ($item->descrArr as $key => $item2) { 
                                if($item2 > 0) {
                                ?>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="b-last-marks__item__category">
                                    <?= $markNames[$key]; ?>:
                                </div>
                                <div class="b-last-marks__item__value">
                                    <?= $item2 ?>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
</div>