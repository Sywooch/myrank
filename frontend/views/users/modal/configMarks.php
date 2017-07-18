<?php

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
        <?= \Yii::t('app','CONFIGURE_THE_DISPLAY_OF_MARKS'); ?>
    </div>
    <div class="b-modal__content">
	<div class="row">
	<?php foreach ($model as $item) { ?>
	    <div class="col-xs-12 col-sm-12">
		<span><?= $item->name ?></span>
                <div>
                    <div style="display: inline-block; width: 400px;" class="select-wrapper">
                        <?= Html::dropDownList('Marks['.$item->id.']', isset($configArr[$item->id]) ? $configArr[$item->id] : 1, Marks::marksAccessFront(), []) ?>
                    </div>
                    <?php if($item->configure) { ?>
                    <div style="display: inline-block;">
                        <span 
                            style="font-size: 25px; color: #f95200; cursor: pointer;" 
                            class="glyphicon glyphicon-cog configMarks"
                            data-url="<?= Url::toRoute([
                                'users/custom-config-marks', 
                                'id' => $item->id,
                                'obj_id' => $mObj->objId,
                                'obj_type' => $mObj->objType,
                            ]) ?>"></span>
                    </div>
                    <?php } ?>
                </div>
	    </div>
	<?php } ?>
	</div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <?= Html::checkbox("Marks[myview]", isset($configArr['myview']) && ($configArr['myview'] == 1)) ?>
                <span>Показывать мою оценку другим</span>
            </div>
        </div>
	<div class="row">
	    <div class="col-xs-12 col-sm-12" id="configMarksError" style="display: none; color:red;"></div>
	</div>
	<div class="b-modal__content__buttons">
	    <div class="b-modal__content__buttons__item">
		<a id="configMarks_save" class="button-small" href="#"><?= \Yii::t('app','SAVE'); ?></a>
	    </div>
	    <div class="b-modal__content__buttons__item">
		<span><a id="configMarks_cancel" class="cancel" href="#"><?= \Yii::t('app','CANCEL'); ?></a></span>
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
    
    $(".configMarks").on("click", function () {
        showModal($(this).attr('data-url'), 0, 0);
    });
</script>