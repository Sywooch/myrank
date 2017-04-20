<?php

use frontend\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Marks;
use yii\helpers\Url;
?>
<div class="b-modal">
    <?php
    $form = ActiveForm::begin([
		'options' => ['id' => 'configMarks'],
    ]);
    ?>
    <div class="b-modal__header">
	Настроить отображение оценок
    </div>
    <div class="b-modal__content">
	<div class="row">
	<?php foreach ($model as $item) { ?>
	    <div class="col-xs-6 col-sm-6">
		<span><?= $item->name ?></span>
		<div class="select-wrapper">
		    <?= Html::dropDownList('Marks['.$item->id.']', isset($configArr[$item->id]) ? $configArr[$item->id] : 1, Marks::$marksAccessFront, []) ?>
		</div>
	    </div>
	<?php } ?>
	</div>

	<div class="row">
	    <div class="col-xs-12 col-sm-12" id="configMarksError" style="display: none; color:red;"></div>
	</div>
	<div class="b-modal__content__buttons">
	    <div class="b-modal__content__buttons__item">
		<a id="configMarks_save" class="button-small" href="#">Сохранить</a>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a id="configMarks_cancel" class="cancel" href="#">Отменить</a></span>
	    </div>
	</div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<script type="text/javascript">
    $("#configMarks_save").on('click', function () {
	url = '<?= Url::toRoute(['users/configmarkssave']) ?>';
	$.ajax({
	    url: url,
	    dataType: 'json',
	    method: 'POST',
	    data: $("#configMarks").serialize(),
	    success: function (out) {
		$("#modalView").modal('hide');
		location.reload(true);
	    }
	});
	return false;
    });
</script>