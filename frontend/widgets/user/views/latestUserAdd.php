<?php 
use yii\helpers\Url;
?>
<div class="b-last-users">
    <div class="container">
	<h2>Последние добавленные пользователи</h2>
	<div class="b-last-users__text">
	    ТОП пользователей с максимальным рейтингом. ТОП пользователей с максимальным
	    рейтингом. ТОП пользователей с максимальным рейтингом.
	</div>
	<div class="b-last-users__carousel owl-carousel owl-theme">
	    <?php foreach ($model as $item) { ?>
	    <div class="item">
		<div class="b-last-users__item">
		    <div class="b-last-users__item__header">
			<div class="b-last-users__item__image">
			    <img src="<?= $item->userImage ?>" alt="">
			</div>
		    </div>
		    <div class="b-last-users__item__content">
			<div class="b-last-users__item__title">
			    <a href="<?= Url::toRoute(['users/profile', 'id' => $item->id]) ?>"><?= $item->fullName ?></a>
			</div>
			<div class="b-last-users__item__text">
			    <?= $item->position ?>
			</div>
		    </div>
		</div>
	    </div>
	    <?php } ?>
	</div>
    </div>
</div>