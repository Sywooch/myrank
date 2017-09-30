<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Html;
use frontend\models\Testimonials;
use yii\helpers\Url;
?>
<!-- begin b-company-evaluation -->
<div class="b-company-evaluation b-block">
    <div class="b-title">
        <?= $title ?>
        <?= Html::dropDownList("selectRole", NULL, Testimonials::whoFromTo(), [
            'prompt' => 'Все',
            'id' => 'selectRole',
            'class' => 'form-control',
            'style' => 'float: right; width: auto;'
        ]); ?>
    </div>

    <div class="b-company-evaluation__container clearfix">
        <?php foreach ($list as $item) { ?>
        <div class="col-md-<?= 12/$cols ?> b-company-evaluation__item" data-id="<?= $item->id ?>" data-role="<?= $item->who_from_to ?>">
                <div class="b-text-rows">
                    <div class="b-text-rows__aside-left b-company-evaluation__img">
                        <div style="width: 92px; height: 92px; overflow: hidden;">
                            <img src="<?= $item->user->imageName ?>" alt="img">
                        </div>
                    </div>
                    <div class="b-text-rows__main b-company-evaluation__main">
                        <div class="b-company-evaluation__name">
                            <?= Html::a($item->user->fullName, $item->user->profileLink) ?>
                        </div>
                        <!-- div class="b-company-evaluation__post">ИТ-директор</div -->
			<?php
			$summMarks = 0;
			$count = 0;
			foreach ($item->descrArr as $item2) {
			    if($item2 != 0.0) {
				$count++;
				$summMarks += $item2;
			    }
			}
			?>
                        <div class="b-company-evaluation__score showModal" style="cursor: pointer" data-url="<?= Url::toRoute(['users/show-detail-marks', 'id' => $item->id]) ?>">
                            <span class="b-company-evaluation__label"><?= Yii::t('app', 'AVERAGE_RATING') ?>:</span>
                            <span class="b-company-evaluation__numbs"><?php
                            if (($count != 0) && ($summMarks != 0)) {
                                echo round($summMarks / $count, 1);
                            } else {
                                echo "0.0";
                            }
                            ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php if(count($list) > $countListView) { ?>
    <div class="b-company-evaluation__container">
        <a href="#" class="b-company-evaluation__link-more">
            <span class="b-more b-more_icon-right">
                <span class="b-more__text"><?= Yii::t('app', 'ALL_MARKS') ?></span>
            </span>
        </a>
    </div>
    <?php } ?>
</div>
<!-- end b-company-trusted -->
<?php
$this->registerJs("
    $('#selectRole').on('change', function () {
        var roleId = $(this).val();
        console.log(roleId);
        $('.b-company-evaluation__container').find('.b-company-evaluation__item').each(function (i, val) {
            itemRoleId = $(val).attr('data-role');
            if(itemRoleId != roleId) {
                $(val).hide('slow');
            } else {
                $(val).show('slow');
            }
            if (roleId == '') {
                $(val).show('slow');
            }
        });
    })", \yii\web\View::POS_END);
?>


