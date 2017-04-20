<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="b-marks b-block">
    <div class="b-title"><?= $title ?></div>
    <div class="b-marks__content">
	<form id="markFields" method="POST" action="#">
	    <?php foreach (isset($allList[0]) ? $allList[0] : [] as $key => $el) { ?>
	    <?php if(count($allList[$key]) > 0) { ?>
    	    <div class="b-marks__item">
    		<div class="b-marks__item__header">
    		    <div class="b-marks__item__header__text">
    			<div class="b-marks__item__header__icon"></div>
    			<span><?= $el ?></span>
    		    </div>
    		    <div class="b-marks__item__header__line"></div>
    		    <div id="summField<?= $key ?>" class="b-marks__item__header__number">0.0</div>
		    <input id="summInput<?= $key ?>" type="hidden" name="mark[0][<?= $key ?>]" value="0.0" />
    		</div>
    		<div class="b-marks__item__content" data-summ="<?= $key ?>">
		    
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
			    </div>
			<?php } ?>
    		</div>
    	    </div>
	    <?php }} ?>
	    <?= Html::hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
	</form>
    </div>
    <div class="b-marks__button">
	<a id="saveMarks" class="button-small" href="#"><?= \Yii::t('app','RATING_SAVE'); ?></a>
    </div>

</div>
<?php
$saveMarks = Url::toRoute(["users/savemarks", 'id' => $uId]);
$script = "
    $(document).ready(function () {
	$('.summField').on('keypress, change, keyup', function () {
	    val = $(this).val();
	    if((val > 10) || (val < 0)) {
		$(this).val(0);
		changeField();
	    }
	});
	$('.summField').on('focus', function() {
	    $(this).val('');
	});
	
	$('.summField').on('blur', function () {
	    $(this).val($(this).attr('data-def'));
	});

	changeField();
	
	$('.marks-slider').slider({
	    change: function () {
		changeField();
	    }
	});
	
	function changeField () {
	    $('.b-marks__item__content').each(function(i, elem) {
		out = 0;
		$(elem).find('.summField').each(function(j, elem2) {
		    $(elem2).attr('data-def', $(elem2).val());
		    out = (out + parseFloat($(elem2).val()) / $(elem).find('.summField').length);
		});
		id = $(elem).attr('data-summ');
		$('#summField' + id).text(out.toFixed(1));
		$('#summInput' + id).val(out.toFixed(1));
	    });
	}";
if(Yii::$app->user->id !== Null) {
    $script .= "$('#saveMarks').on('click', function() {
		$(this).parents('.b-marks').addClass('b-marks_loading');
		$.ajax({
		    'url' : '".$saveMarks."',
		    'method': 'POST',
		    'data' : $('#markFields').serialize(),
		    'dataType' : 'json',
		    'success' : function(out) {
			if(out.code === 1) {
			    $('#saveMarks').parents('.b-marks').removeClass('b-marks_loading');
			    location.reload(true);
			    //alertInfo('Ваша оценка сохранена');
			}
		    }
		});
		return false;
	    });";
} else {
    $script .= "$('#saveMarks').on('click', function() {
		    alertRed('".\Yii::t('app','ENTER_TO_LEAVE_MARKS_FOR_USERS')."');
		return false;
	    });";
}
$script .= "});";
$this->registerJs($script, \yii\web\View::POS_END);
?>