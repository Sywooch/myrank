<?php
use yii\helpers\Url;

if(count($model) > 0) {
?>
<div class="b-trusted-users b-block">
    <div class="b-title">Доверенные лица</div>
    <div class="b-trusted-users__content">
	<?php foreach ($model as $item) { ?>
	<div class="b-trusted-users__item">
	    <div class="b-trusted-users__item__image">
		<img src="<?= $item->user->userImage ?>" alt="">
	    </div>
	    <div class="b-trusted-users__item__content">
		<div class="b-trusted-users__item__name">
		    <a href="<?= Url::toRoute(['users/profile', 'id' => $item->user->id]) ?>"><?= $item->user->fullName ?>
		</div>
		<div class="b-trusted-users__item__place">
		    <?= $item->user->position ?>
		</div>
		<div class="b-tags">
		    <span>Mobile UI design</span>
		</div>
	    </div>
	</div>
	<?php } ?>
	<div class="link">
	    <a href="#"><span>Посмотреть всех</span></a>
	</div>
    </div>
</div>
<?php } ?>