<?php 
use frontend\models\Testimonials;
use yii\helpers\Url;
?>
<div class="b-comments b-block">
    <div class="b-title">
	Отзывы
	<a class="button-small" id="writeTestimonial" href="#">Оставить отзыв</a>
    </div>
    <div class="b-comments__content">
	<?php foreach ($list as $key => $item) { ?>
	<div class="b-comments__item">
	    <div class="b-comments__item__image">
		<img src="/images/users/2.jpg" alt="">
		<div class="b-comments__item__number">
		    978
		</div>
	    </div>
	    <div class="b-comments__item__info">
		<div class="b-comments__item__date">
		    5.12.2016
		</div>
		<div class="b-comments__item__smile b-comments__item__smile_positive"></div>
		<div class="b-comments__item__actions">
		    <a href="#">Ответить</a>
		    <a href="#">Пожаловаться</a>
		</div>
	    </div>
	    <div class="b-comments__item__content">
		<div class="b-comments__item__title">
		    Отличный работник!
		</div>
		<div class="b-comments__item__name">
		    Ева Гарднер
		</div>
		<div class="b-comments__item__post">
		    Инженер
		</div>
		<div class="b-comments__item__text">
		    <p>
			Далеко-далеко за словесными горами в
			стране гласных и согласных живут рыбные
			тексты. Вдали от всех живут они в буквенных
			домах на берегу Семантика большого
			языкового океана. Маленький ручеек журчит.
		    </p>
		</div>
	    </div>
	</div>
	<?php } ?>
	
	<?php if(count($list) > Testimonials::COUNT_LIST) { ?>
	<div class="b-comments__button-more">
	    <span class="b-comments__button-more__default">БОЛЬШЕ</span>
	    <span class="b-comments__button-more__loading"></span>
	</div>
	<?php } ?>
    </div>
</div>
<?php
$this->registerJs(""
	. "$('#writeTestimonial').on('click', function() {"
	. "url = '".Url::toRoute("user/writetestimonials")."';"
	. "csrf = '".Yii::$app->getRequest()->getCsrfToken()."';"
	. "showModal(url, 1, csrf); "
	. "return false;})", \yii\web\View::POS_END);
?>