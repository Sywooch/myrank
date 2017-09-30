<?php
/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com 
 */
?>

<?php foreach (isset($allList[$key]) ? $allList[$key] : [] as $key2 => $el2) { ?>
    <div class="b-marks__item__content__row">
        <div class="b-marks__item__content__text"><?= $el2 ?></div>
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

