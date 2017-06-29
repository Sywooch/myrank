<?php

use yii\helpers\Url;

$get = Yii::$app->request->get();
?>
<div class="b-search__content">
    <?php foreach ($model as $item) { ?>
        <!-- begin b-user -->
        <div class="b-user">
    	<div class="b-user__data">
    	    <div class="b-user__data__left">
    		<div class="b-user__data__image">
    		    <img src="<?= $item->imageName ?>" alt="">
    		    <div class="b-user__data__image__info">
    			<ul>
				<?php 
                                foreach ($item->profileProfession as $item2) { ?>
				    <li><?= $item2->title ?></li>
				<?php } ?>
    			</ul>
    			<!-- div class="b-user__data__image__info__likes">
    			    10
    			</div -->
    			<!-- div class="b-user__data__image__info__messages">
    			    12
    			</div -->
    		    </div>
    		</div>
    	    </div>
    	    <div class="b-user__data__right">
    		<div class="b-user__data__header">
    		    <div class="b-user__data__name">
    			<div><a href="<?= Url::toRoute($item->profileLink) ?>"><?= $item->fullName ?></a></div>
    			<!-- span class="b-user__data__name__edit"></span -->
    		    </div>
    		    <div class="b-user__data__info">
			    <?php if ((Yii::$app->user->id !== null) && !$item->owner) { ?>
				<a class="b-user__data__info__add-trusted <?= $item->trustUser ? "minus" : "" ?>" 
                                   href="#" 
                                   data-url="<?= Url::toRoute(['users/trustees', 'id' => $item->id]) ?>">
				    <?= $item->trustUser ? \Yii::t('app', 'TRUSTED_SMALL') : \Yii::t('app', 'IN_TRUSTED_SMALL') ?>
				</a>
			    <?php } ?>
    			<div class="b-user__data__info__rating">
    			    <span><?= $item->rating ?></span>
				<?= \Yii::t('app', 'RATING'); ?>
    			</div>
    		    </div>
    		</div>
    		<div class="b-user__data__content">
    		    <div class="b-user__data__content__item">
    			<div class="b-user__data__content__item__adress">
				<?= $item->position ?>
    			</div>
    		    </div>
			<?php if ($item->company_name != "") { ?>
			    <div class="b-user__data__content__item">
				<div class="b-user__data__content__item__work">
				    <?= $item->company_name ?>
				</div>
			    </div>
			<?php } ?>
    		</div>
    		<div class="b-tags">
			<?php foreach ($item->profileProfession as $item2) { ?>
			    <span><?= $item2->title ?></span>
			<?php } ?>
    		</div>
    	    </div>
    	</div>
        </div>
    <?php } ?>
</div>

<?php
if ($pagin['count'] > $USmodel->limit) {
    unset($get['UsersSearch']['page']);

    $getParam = $get;
    $getParam[] = 'users/search';
    $getParam['UsersSearch']['page'] = 1;
    $paramsFirsPage = $getParam;
    $getParam['UsersSearch']['page'] = $pagin['pages'];
    $paramsEndPage = $getParam;
    ?>
    <div class="b-pagination">
        <ul>
    	<li class="b-pagination__prev">
		<?php if ($USmodel->page != 1) { ?>
		    <a href="<?= Url::toRoute($paramsFirsPage) ?>"></a>
		<?php } ?>
    	</li>
	    <?php
	    for ($i = 1; $i <= $pagin['pages']; $i++) {
		$getParam['UsersSearch']['page'] = $i;
		?>
		<li <?= $USmodel->page == $i ? 'class="active"' : "" ?>>
		    <a href="<?= Url::toRoute($getParam) ?>"><?= $i ?></a>
		</li>
	    <?php } ?>
    	<li class="b-pagination__next">
		<?php if ($USmodel->page != $pagin['pages']) { ?>
		    <a href="<?= Url::toRoute($paramsEndPage) ?>"></a>
		<?php } ?>
    	</li>
        </ul>
    </div>
<?php
}
$this->registerJs("
    $('.b-user__data__info__add-trusted').on('click', function() {
	var that = $(this);
	url = $(this).attr('data-url');
	$.post(url, {'_csrf-frontend':$('[name=\"csrf-token\"]').attr('content')}, function(out) {
	    if(out.code) {
		that.text(out.data);
		alertInfo('" . \Yii::t('app', 'YOUR_REQUEST_HAS_BEEN_SENT_AND_IS_WAITING_FOR_CONFIRMATION_BY_THE_USER') . "');
	    }
	}, 'json');
	return false;
    })", yii\web\View::POS_END);
?>
