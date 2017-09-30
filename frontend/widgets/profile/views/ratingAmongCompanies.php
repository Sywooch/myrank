<?php
use yii\bootstrap\Html;
use frontend\models\Company;
//echo "<pre>"; var_dump($model); echo "</pre>";
?>
<!-- begin b-sidebar -->
<aside class="b-sidebar">

    <!-- begin b-list-rating -->
    <div class="b-list-rating b-block">
        <div class="b-title"><?= Yii::t('app', 'RATING_FROM_COMPANY') ?></div>
        <div class="b-list-rating__container">
            <?php foreach ($model as $item) { 
                $mObj = Company::findOne($item['id']);
                ?>
                <div class="b-list-rating__item">
                    <div class="b-text-rows">
                        <div class="b-text-rows__aside-left b-list-rating__logo">
                            <?= Html::a(Html::img($mObj->imageName), ['company/profile', 'id' => $item['id']]) ?>
                        </div>

                        <div class="b-text-rows__main b-list-rating__main">
                            <div class="b-list-rating__name">
                                <?= Html::a($item['name'], ['company/profile', 'id' => $item['id']]) ?>
                            </div>
                            <div class="b-list-rating__stats" style="width: 168px;">
                                <!-- ul class="b-stats">
                                    <li class="b-stats__item">
                                        <i class="b-stats__icon b-stats__icon_users"></i>
                                        <span class="b-stats__numbs">1</span>
                                    </li>
                                    <li class="b-stats__item">
                                        <i class="b-stats__icon b-stats__icon_diagram"></i>
                                        <span class="b-stats__numbs">2</span>
                                    </li>
                                    <li class="b-stats__item">
                                        <i class="b-stats__icon b-stats__icon_comments"></i>
                                        <span class="b-stats__numbs">5</span>
                                    </li>
                                </ul -->
                            </div>
                        </div>

                        <div class="b-text-rows__aside-right b-list-rating__score">
                            <div class="b-list-rating__label"><?= Yii::t('app', 'RATING') ?>:</div>
                            <div class="b-list-rating__numbs"><?= $mObj->rating ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <a href="<?= \yii\helpers\Url::toRoute(['users/search']) ?>" class="b-list-rating__link-more">
            <span class="b-more b-more_icon-right">
                <span class="b-more__text"><?= Yii::t('app', 'ALL_RATING') ?></span>
            </span>
        </a>
    </div>
    <!-- end b-list-rating -->

</aside>
<!-- end b-sidebar -->