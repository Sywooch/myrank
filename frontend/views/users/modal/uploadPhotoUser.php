<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\models\UserConstant;
$i = 0;
$mObj = UserConstant::getProfile();
$folder = $mObj->isCompany ? 'company' : 'user';
$imagePath = "/" . implode(DIRECTORY_SEPARATOR, ['files', $folder, $mObj->objId, $mObj->image]);
?>
<div class="b-modal__header">
    <?= \Yii::t('app','UPLOAD_AVATAR'); ?>
</div>
<div class="b-modal__content">
    <div class="b-modal__content__portfolio">
	<form action="" method="POST" id="formPortfolio">
    	    <div class="b-modal__content__portfolio__item" id="uploadFile<?= $i ?>">
    		<div class="b-modal__content__portfolio__item__image">
    		    <div class="input-file-wrapper">
    			<span><?= \Yii::t('app','UPLOAD_A_NEW_PHOTO'); ?></span>
    			<input id="images-name<?= $i ?>" name="Images[name<?= $i ?>]" type="file" accept="image/*" />
    		    </div>
    		</div>
    	    </div>
    	    <script type="text/javascript">
    		;
    		jQuery('#images-name<?= $i ?>').fileupload({url: "<?= Url::toRoute(['media/imageupload', 'id' => $i]) ?>"});
    		jQuery('#images-name<?= $i ?>').on('fileuploaddone', function (e, data) {
    		    res = (JSON.parse(data.result)).files[0];
    		    $("#uploadFile" + res.fieldId + " .b-modal__content__portfolio__item__image").html("<img src='" + res.url + "' />");
    		});
    		jQuery('#images-name<?= $i ?>').on('fileuploadfail', function (e, data) {
                    console.log(data.jqXHR.responseText);
    		    alert("<?= \Yii::t('app','PHOTO_DID_NOT_LOAD_PLEASE_CONSULT_ADMINISTRATOR'); ?>");
    		});

    	    </script>
	    <?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
	</form>
    </div>
    <div class="b-modal__content__buttons" style="width:100%">
	<div class="b-modal__content__buttons__item">
	    <a id="saveUserImage" class="button-small" href="#"><?= \Yii::t('app','SAVE'); ?></a>
	</div>
	<div class="b-modal__content__buttons__item">
	    <span><a class="cancel" href="#"><?= \Yii::t('app','CANCEL'); ?></a></span>
	</div>
    </div>
</div>
<script type="text/javascript">
    $("#saveUserImage").on('click', function () {
	url = '<?= Url::toRoute(['users/saveuserimage']); ?>';
	$.post(url, {'_csrf-frontend': $('[name="csrf-token"]').attr('content')}, function (out) {
	    if(out.code == 1) {
		location.reload(true);
	    }
	}, 'json');
	return false;
    });
</script>