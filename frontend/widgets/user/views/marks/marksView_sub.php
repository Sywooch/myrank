<?php
/**
 * @author Shilo Dmitry 
 * @email dmitrywp@gmail.com
 */
foreach ($allList[$key] as $key2 => $item) {
    if (isset($allList[$key2])) {
        ?>
        <div class="b-marks__item__with-sub">
            <div class="b-marks__item__with-sub-content">
                <div class="b-marks__item__with-sub-content__header">
                    <div class="b-marks__item__with-sub-content__header__text">
                        <div class="b-marks__item__with-sub-content__header__text__wrapper">
                            <span><?= $item ?></span>
                        </div>
                    </div>
                    <!-- div class="b-marks__item__with-sub-content__header__number">
                        9.6
                    </div -->
                </div>
                <div class="b-marks__item__with-sub-content__wrapper">
                    <?= $this->render('marksView_items', ['allList' => $allList, 'list' => $list, 'key' => $key2]) ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="b-marks__item__content__row">
            <div class="b-marks__item__content__text"><?= $item ?></div>
            <div class="b-marks__item__content__slider">
                <div class="b-marks__item__content__slider__amount">
                    <input type="text" 
                           name="mark[<?= $key2 ?>]" 
                           class="marks-slider-amount summField" 
                           value="<?= isset($list[$key2]) ? $list[$key2] : '0.0' ?>"
                           data-def="<?= isset($list[$key2]) ? $list[$key2] : '0.0' ?>">
                </div>
                <div class="b-marks__item__content__slider__content">
                    <div class="marks-slider"></div>
                </div>
            </div>
            <div class="b-marks__item__content__like b-marks__item__content__like_down" 
                 <?= (isset($list[$key2]) && ($list[$key2] > 0)) ?: 'style="display:none"' ?>>
                <span class="b-marks__item__content__like__image"></span>
            </div>
        </div>
    <?php } ?>
<?php } ?>

