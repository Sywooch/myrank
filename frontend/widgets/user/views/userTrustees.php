<?php

use yii\helpers\Url;
use frontend\models\UserTrustees;
use yii\helpers\Html;

if (count($list) > 0) {
    ?>
    <div class="b-trusted-users b-block">
        <div class="b-title"><?= \Yii::t('app','TRUSTED_PERSONS'); ?></div>
        <div class="b-trusted-users__content">
	    <?php foreach ($list as $item) { 
                if($model->id == $item->user->id) {
                    $obj = $item->userFrom;
                } else {
                    $obj = $item->user;
                }
                ?>
		<div class="b-trusted-users__item">
		    <div class="b-trusted-users__item__image">
                        <?= Html::a(Html::img($obj->imageName), $obj->profileLink) ?>
		    </div>
		    <div class="b-trusted-users__item__content">
			<div class="b-trusted-users__item__name">
                            <?= Html::a($obj->fullName, $obj->profileLink) ?>
			</div>
			<div class="b-trusted-users__item__place">
			    <?= $obj->position ?>
			</div>
			<div class="b-tags">
			    <?php foreach ($obj->profileProfession as $item2) { ?>
	    		    <span><?= $item2->title ?></span>
			    <?php } ?>
			</div>
		    </div>
		</div>
	    <?php } ?>
	    <?php if ($count > UserTrustees::COUNT_LIST_USER_PROFILE) { ?>
		<div class="link">
		    <a href="#" class="showModal" data-url="<?= Url::toRoute(['users/alltrustuser', 'id' => $model->id]) ?>">
			<span><?= \Yii::t('app','VIEW_ALL'); ?></span>
		    </a>
		</div>
		<!-- script type="text/javascript">
		    $("#showAllTrustees").on('click', function() {
			var url = $(this).attr("data-url");
			$(this).parents('.b-trusted-users__content').addClass('b-marks_loading');
			$.post(url, {'_csrf-frontend' : $('[name="csrf-token"]').attr('content')}, function(out) {
			    if(out.code == 1) {
				$(".b-trusted-users__content").html(out.data);
				$('.b-trusted-users__content').removeClass('b-marks_loading');
			    }
			}, 'json');
		    });
		</script -->
	    <?php } ?>
        </div>
    </div>
<?php } ?>