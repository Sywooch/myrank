<?php
use yii\helpers\Url;
?>
<div class="b-rating">
    <div class="container">
	<h2>Лучший рейтинг</h2>
	<div class="b-rating__header">
	    <div class="b-rating__header__text">
		ТОП пользователей с максимальным рейтингом. ТОП пользователей с максимальным
		рейтингом. ТОП пользователей с максимальным рейтингом.
	    </div>
	    <div class="b-rating__header__link">
		<a href="#">Все категории</a>
	    </div>
	</div>
	<div class="b-rating__content">
	    <?php foreach ($model as $item) { ?>
	    <div class="b-rating__col">
		<div class="b-rating__item">
		    <div class="b-rating__item__header">
			<div class="b-rating__item__image">
			    <img src="<?= $item->userImage ?>" alt="">
			    <div class="b-rating__item__info">
				<ul>
				    <?php foreach ($item->userProfession as $item2) { ?>
				    <li><?= $item2->title ?></li>
				    <?php } ?>
				</ul>
				<!-- div class="b-rating__item__likes">
				    10
				</div>
				<div class="b-rating__item__messages">
				    12
				</div -->
			    </div>
			    <div class="b-rating__item__number"><?= $item->rating ?></div>
			</div>
		    </div>
		    <div class="b-rating__item__content">
			<div class="b-rating__item__title">
			    <!-- a href="<?= Url::toRoute(['users/profile', 'id' => $item->id]) ?>" -->
					    <?= $item->fullName ?>
			    <!-- /a -->
			</div>
			<div class="b-rating__item__text"><?= $item->company_post ?></div>
		    </div>
		</div>
	    </div>
	    <?php } ?>
	</div>
    </div>
</div>