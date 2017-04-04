<?php
use yii\helpers\Url;
?>

<?php foreach ($model as $item) { ?>
    <div class="b-trusted-users__item">
        <div class="b-trusted-users__item__image">
    	<img src="<?= $item->user->userImage ?>" alt="">
        </div>
        <div class="b-trusted-users__item__content">
    	<div class="b-trusted-users__item__name">
    	    <a href="<?= Url::toRoute(['users/profile', 'id' => $item->user->id]) ?>">
		    <?= $item->user->fullName ?>
    	    </a>
    	</div>
    	<div class="b-trusted-users__item__place">
		<?= $item->user->position ?>
    	</div>
    	<div class="b-tags">
		<?php foreach ($item->user->userProfession as $item2) { ?>
		    <span><?= $item2->title ?></span>
		<?php } ?>
    	</div>
        </div>
    </div>
<?php } ?>