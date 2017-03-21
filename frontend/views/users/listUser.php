<?php

use yii\helpers\Url;
?>
<div class="b-modal__header">
    <?= $title ?>
</div>
<div class="b-modal__content">
    <?php // var_dump($model)  ?>
	<?php foreach ($model as $item) { ?>
        <div class="b-last-marks">
            <div class="b-last-marks__content">
                <div class="b-last-marks__item">
                    <div class="b-last-marks__item__image">
                        <img src="/images/no_photo.png" alt="">
                    </div>
                    <div class="b-last-marks__item__content">
                        <div class="b-last-marks__item__name">
                            <a href="<?= Url::toRoute(['users/profile', 'id' => $item->user->id]) ?>">
                               <?= $item->user->fullName ?>
                            </a>
                        </div>
                        <div class="b-last-marks__item__date">
                            17.03.2017
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="b-last-marks__item__category">
                                    Работа:
                                </div>
                                <div class="b-last-marks__item__value">
                                    7.5
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="b-last-marks__item__category">
                                    Учеба:
                                </div>
                                <div class="b-last-marks__item__value">
                                    7.5
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="b-last-marks__item__category">
                                    Качество:
                                </div>
                                <div class="b-last-marks__item__value">
                                    7.5
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="b-last-marks__item__category">
                                    Успех:
                                </div>
                                <div class="b-last-marks__item__value">
                                    7.5
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php } ?>
</div>