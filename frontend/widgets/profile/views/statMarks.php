<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Html;
?>
<!-- begin b-company-evaluation -->
<div class="b-company-evaluation b-block">
    <div class="b-title">
        Оценки компании
    </div>

    <div class="b-company-evaluation__container clearfix">
        <?php foreach ($list as $item) { ?>
            <div class="col-md-6 b-company-evaluation__item">
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
                        <div class="b-company-evaluation__score">
                            <span class="b-company-evaluation__label">Средняя<br> оценка:</span>
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


    <div class="b-company-evaluation__container">
        <a href="#" class="b-company-evaluation__link-more">
            <span class="b-more b-more_icon-right">
                <span class="b-more__text">Все оценки</span>
            </span>
        </a>
    </div>
</div>
<!-- end b-company-trusted -->


