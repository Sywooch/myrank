<?php 
use yii\helpers\Html;
?>
<div class="b-marks b-block">
    <div class="b-title">Оценки</div>
    <div class="b-marks__content">
	<form id="markFields" method="POST" action="#">
	    <?php foreach ($allList[0] as $key => $el) { ?>
    	    <div class="b-marks__item">
    		<div class="b-marks__item__header">
    		    <div class="b-marks__item__header__text">
    			<div class="b-marks__item__header__icon"></div>
    			<span><?= $el ?></span>
    		    </div>
    		    <div class="b-marks__item__header__line"></div>
    		    <div id="summField<?= $key ?>" class="b-marks__item__header__number">0.0</div>
    		</div>
    		<div class="b-marks__item__content" data-summ="summField<?= $key ?>">
			<?php foreach (isset($allList[$key]) ? $allList[$key] : [] as $key2 => $el2) { ?>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text"><?= $el2 ?></div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" 
					       name="mark[<?= $key2 ?>]" 
					       class="marks-slider-amount summField" 
					       value="<?= isset($list[$key2]) ? $list[$key2] : '0.0' ?>">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			<?php } ?>
    		</div>
    	    </div>
	    <?php } ?>
	    <?= Html::hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
	</form>
    </div>
    <div class="b-marks__button">
	<a id="saveMarks" class="button-small" href="#">Сохранить оценку</a>
    </div>

</div>
<?php
$saveMarks = \yii\helpers\Url::toRoute(["user/savemarks", 'id' => $uId]);
$this->registerJs("
    $(document).ready(function () {
	setInterval(function() {
	    $('.b-marks__item__content').each(function(i, elem) {
		out = 0;
		$(elem).find('.summField').each(function(j, elem2) {
		    out = (out + parseFloat($(elem2).val()) / $(elem).find('.summField').length);
		});
		id = $(elem).attr('data-summ');
		$('#' + id).text(out.toFixed(1));
	    });
	}, 1000);
	$('#saveMarks').on('click', function() {
	    $.ajax({
		'url' : '".$saveMarks."',
		'method': 'POST',
		'data' : $('#markFields').serialize(),
		'dataType' : 'json',
	    });
	    return false;
	});
    });
    ", \yii\web\View::POS_END);
?>