<?php 
use frontend\models\User;
use yii\helpers\Url;

if (Yii::$app->user->id === null) { ?>
    <div class="col-xs-12 col-sm-6">
        <div class="b-header__user">
    	<div class="b-header__user__login">
    	    <span>Добро пожаловать в MyRank!</span>
    	    <a href="#">
    		<span>Авторизация</span>
    	    </a>
    	</div>

        </div>
    </div>
<?php } else {
    $mUser = User::getProfile();
    ?>
    <div class="col-xs-12 col-sm-6">
        <div class="b-header__user">

    	<div class="b-header__user__info">
    	    <div class="b-header__user__info__image">
    		<img src="images/users/1.jpg" alt="">
    	    </div>
    	    <div class="b-header__user__info__text">
    		<a href="#">
    		    <span><?= $mUser->fullName ?></span>
    		</a>
    	    </div>
    	    <div class="b-header__user__info__dropdown">
    		<ul>
    		    <li><a href="#">Опция один</a></li>
    		    <li><a href="#">Активный пункт меню</a></li>
    		    <li><a href="#">Опция два</a></li>
		    <li><a href="<?= Url::toRoute(['site/logout']); ?>">Выход <span></span></a></li>
    		</ul>
    	    </div>
    	</div>

    	<div class="b-header__user__stats">
    	    <div class="b-header__user__stats__item active">
    		<div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_1"></div>
    		<span>1</span>
    	    </div>
    	    <div class="b-header__user__stats__item active">
    		<div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_2"></div>
    		<span>2</span>
    	    </div>
    	    <div class="b-header__user__stats__item active">
    		<div class="b-header__user__stats__item__icon b-header__user__stats__item__icon_3"></div>
    		<span>5</span>
    	    </div>
    	</div>

        </div>
    </div>
<?php } ?>