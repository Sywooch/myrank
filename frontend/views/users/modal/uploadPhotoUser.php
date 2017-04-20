<?php

use yii\helpers\Url;
use yii\helpers\Html;
$i = 1;
?>
<div class="b-modal__header">
    Загрузить аватар 
</div>
<div class="b-modal__content">
    <div class="b-modal__content__portfolio">
	<form action="" method="POST" id="formPortfolio">
    	    <div class="b-modal__content__portfolio__item" id="uploadFile<?= $i ?>">
    		<div class="b-modal__content__portfolio__item__image">
    		    <div class="input-file-wrapper">
    			<span>Загрузите новое фото</span>
    			<input id="images-name<?= $i ?>" name="Images[name<?= $i ?>]" data-url="<?= Url::toRoute(['media/imageupload', 'id' => $i]) ?>" type="file" accept="image/*" />
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
    		    alert("Фото не загрузилось, пожалуйсто обратитесь к администратору");
    		});

    	    </script>
	    <?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []); ?>
	</form>
    </div>
    <div class="b-modal__content__buttons" style="width:100%">
	<div class="b-modal__content__buttons__item">
	    <a id="saveUserImage" class="button-small" href="#">Сохранить</a>
	</div>
	<div class="b-modal__content__buttons__item">
	    <span><a class="cancel" href="#">Отменить</a></span>
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