<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="b-modal__header">
    <?= \Yii::t('app','PORTFOLIO'); ?>
</div>
<div class="b-modal__content">
    <div class="b-modal__content__portfolio">
	<form action="" method="POST" id="formPortfolio">
	    <?php for ($i = 1; $i <= 5; $i++) { ?>
    	    <div class="b-modal__content__portfolio__item" id="uploadFile<?= $i ?>">
    		<div class="b-modal__content__portfolio__item__image">
    		    <div class="input-file-wrapper">
    			<span><?= \Yii::t('app','UPLOAD_A_NEW_PROJECT_PHOTO'); ?></span>
    			<input id="images-name<?= $i ?>" name="Images[name<?= $i ?>]" data-url="<?= Url::toRoute(['media/imageupload', 'id' => $i]) ?>" type="file">
    		    </div>
    		</div>
    		<div class="b-modal__content__portfolio__item__content">
    		    <div class="row">
    			<div class="col-xs-12">
    			    <input type="text" name="Images[title][]" class="input-text" placeholder="<?= \Yii::t('app','PROJECT_NAME'); ?> <?= $i ?>">
    			</div>
    		    </div>
    		    <div class="row">
    			<div class="col-xs-12">
    			    <textarea name="Images[description][]" placeholder="<?= \Yii::t('app','PROJECT_DESCRIPTION'); ?> <?= $i ?>"></textarea>
    			    <i><?= \Yii::t('app','NO_MORE_THAN_500_CHARACTERS'); ?></i>
    			</div>
    		    </div>
    		</div>
    	    </div>
    	    <script type="text/javascript">
    		;
    		jQuery('#images-name<?= $i ?>').fileupload({"url": "/media/imageupload?id=<?= $i ?>"});
    		jQuery('#images-name<?= $i ?>').on('fileuploaddone', function (e, data) {
    		    res = (JSON.parse(data.result)).files[0];
    		    $("#uploadFile" + res.fieldId + " .b-modal__content__portfolio__item__image").html("<img src='" + res.url + "' />");
    		});
    		jQuery('#images-name<?= $i ?>').on('fileuploadfail', function (e, data) {
    		    alert(<?= \Yii::t('app','PHOTO_DID_NOT_LOAD_PLEASE_CONSULT_ADMINISTRATOR') ?>);
    		});

    	    </script>
	    <?php } ?>
	    <?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
	</form>
    </div>
    <div class="b-modal__content__buttons">
	<div class="b-modal__content__buttons__item">
	    <a id="savePortfolio" class="button-small" href="#"><?= \Yii::t('app','SAVE'); ?></a>
	</div>
	<div class="b-modal__content__buttons__item">
	    <span><a href="#"><?= \Yii::t('app','CANCEL'); ?></a></span>
	</div>
    </div>
</div>
<script type="text/javascript">
    $("#savePortfolio").on('click', function () {
	$.ajax({
	    url: "<?= Url::toRoute(['users/saveportfolio']); ?>",
	    type: 'POST',
	    data: $("#formPortfolio").serialize(),
	    dataType: 'json',
	}).done(function() {location.reload(true)});
	return false;
    });
</script>