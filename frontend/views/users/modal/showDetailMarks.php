<button type="button" class="modal-close" data-dismiss="modal"></button>

<div class="b-modal">
    <form action="#">
        <div class="b-modal__header b-modal__header_small b-modal__header_without-theme">
            Оценка
        </div>
        <div class="b-modal__content b-modal__content_small">
            <div class="b-modal__content__user">
                <div class="b-modal__content__user__header">
                    <div class="b-user__data">
                        <div class="b-user__data__image b-user__data__left  b-user__data__image_sm b-user__data__image_square">
                            <img src="<?= $model->user->imageName ?>" alt="">
                        </div>
                        <div class="b-user__data__right clearfix">
                            <div class="b-user__data__container">
                                <div class="b-user__data__header">
                                    <div class="b-user__data__name">
                                        <h1><?= $model->user->fullName ?></h1>
                                    </div>
                                </div>

                                <div class="b-user__data__content">
                                    <div class="b-user__data__content__item">
                                        <div class="b-user__data__content__item__post">
                                            <?= "" // Должность ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $summMarks = 0;
                            $count = 0;
                            foreach ($model->descrArr as $item2) {
                                if ($item2 != 0.0) {
                                    $count++;
                                    $summMarks += $item2;
                                }
                            }
                            ?>
                            <div class="b-user__data__aside">
                                <div class="b-user__data__score">
                                    <div class="b-user__data__score__label">Средняя<br> оценка:</div>
                                    <div class="b-user__data__score__numbs"><?php
                                        if (($count != 0) && ($summMarks != 0)) {
                                            echo round($summMarks / $count, 1);
                                        } else {
                                            echo "0.0";
                                        }
                                        ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b-modal__content__user__content">
                    <?php
                    $list = \yii\helpers\Json::decode($model->description, true);
                    $listVals = $model->allMarkName;
                    //echo "<pre>"; var_dump($listVals); echo "</pre>";
                    foreach ($listVals[0] as $key => $item) {
                        $mainVal = isset($list[0][$key]) ? $list[0][$key] : '0.0';
                        if ($mainVal > 0) {
                            ?>
                            <div class="b-marks__item">
                                <div class="b-marks__item__header">
                                    <div class="b-marks__item__header__text">
                                        <div class="b-marks__item__header__icon"></div>
                                        <span><?= $listVals[0][$key] ?></span>
                                    </div>
                                    <div class="b-marks__item__header__line"></div>
                                    <div class="b-marks__item__header__number"><?= $mainVal ?></div>
                                </div>
                                <div class="b-marks__item__content">
                                    <?php
                                    //echo "<pre>"; var_dump($listVals); echo "</pre>";

                                    foreach (isset($listVals[$key]) ? $listVals[$key] : [] as $subKey => $subItem) {
                                        $val = isset($list[$subKey]) ? $list[$subKey] : '0.0';
                                        $like = $val < 5 ? 'like_down' : 'like_up';
                                        if($val > 0) {
                                        ?>
                                        <div class="b-marks__item__content__row">
                                            <div class="b-marks__item__content__text">
                                                <?= $subItem ?>
                                            </div>
                                            <div class="b-marks__item__content__slider">
                                                <div class="b-marks__item__content__slider__amount">
                                                    <input type="text" class="marks-slider-amount" value="<?= $val ?>">
                                                </div>
                                                <div class="b-marks__item__content__slider__content">
                                                    <div class="marks-slider"></div>
                                                </div>
                                            </div>
                                            <div class="b-marks__item__content__like b-marks__item__content__<?= $like ?>">
                                                <span class="b-marks__item__content__like__image"></span>
                                            </div>
                                        </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('.b-marks__item__header').on('click', function () {
        var that = $(this);
        var parent = that.parents('.b-marks__item');

        parent.toggleClass('open');
    });
</script>