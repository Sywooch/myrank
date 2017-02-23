<?php
use frontend\widgets\user\MarksWidget;
use frontend\widgets\user\MarksDiagramWidget;
use frontend\widgets\user\UserInfoWidget;
use frontend\widgets\user\TestimonialsWidget;
use yii\helpers\Url;

$fieldVal = $mUser->attributeLabels();
?>

<div class="container">
    <div id="main">

	<!-- begin b-content -->
	<div class="b-content">

	    <!-- begin b-user -->
	    <div class="b-user b-block">
		<div class="b-user__data">
		    <div class="b-user__data__left">
			<div class="b-user__data__image">
			    <img src="<?= $mUser->image ?>" alt="">
			</div>
		    </div>
		    <div class="b-user__data__right">
			<div class="b-user__data__header">
			    <div class="b-user__data__name">
				<h1><?= $mUser->fullName ?></h1>
				<?php if($mUser->owner) { ?>
				<span 
				    class="b-user__data__name__edit modalView" 
				    data-url="<?= Url::toRoute("users/editmaininfo"); ?>"></span>
				<?php } ?>
			    </div>
			    <div class="b-user__data__info">
				<a class="b-user__data__info__add-trusted" href="#">
				    В доверенные
				</a>
				<div class="b-user__data__info__rating">
				    <span>996</span>
				    Рейтинг
				</div>
			    </div>
			</div>
			<div class="b-user__data__content">
			    <div class="b-user__data__content__item">
				<div class="b-user__data__content__item__adress">
				    <?= $mUser->position ?>
				</div>
			    </div>
			    <div class="b-user__data__content__item">
				<div class="b-user__data__content__item__work">
				    ООО Астам
				</div>
			    </div>
			</div>
			<!-- div class="b-tags">
			    <span>Web design</span>
			    <span>User Experience Design</span>
			    <span>Mobile UI design</span>
			    <span>Adobe Photoshop</span>
			</div -->
		    </div>
		</div>
		<div class="b-user__stats">
		    <div class="b-user__stats__item">
			<div class="b-user__stats__item__content">
			    <div class="b-user__stats__item__icon b-user__stats__item__icon_1"></div>
			    <div class="b-user__stats__item__text">
				Доверенных:
			    </div>
			    <div class="b-user__stats__item__number">
				0
			    </div>
			    <!-- div class="b-user__stats__item__new-number">
				1
			    </div -->
			</div>
		    </div>
		    <div class="b-user__stats__item">
			<div class="b-user__stats__item__content">
			    <div class="b-user__stats__item__icon b-user__stats__item__icon_2"></div>
			    <div class="b-user__stats__item__text">
				Оценок:
			    </div>
			    <div class="b-user__stats__item__number">
				0
			    </div>
			    <!-- div class="b-user__stats__item__new-number">
				2
			    </div -->
			</div>
		    </div>
		    <div class="b-user__stats__item">
			<div class="b-user__stats__item__content">
			    <div class="b-user__stats__item__icon b-user__stats__item__icon_3"></div>
			    <div class="b-user__stats__item__text">
				Отзывов:
			    </div>
			    <div class="b-user__stats__item__number">
				0
			    </div>
			    <!-- div class="b-user__stats__item__new-number">
				1
			    </div -->
			</div>
		    </div>
		</div>
		<div class="b-user__info">
		    <div class="b-title">
			Личная информация
		    </div>
		    <div class="b-user__info__content">
			<div class="b-user__info__text">
			    <p><?= $mUser->about ?></p>
			</div>
			<div class="b-user__info__list">
			    <?= UserInfoWidget::widget([
				'model' => $mUser,
				'fields' => [
				    $fieldVal['phone'] => $mUser->phone,
				],
			    ]); ?>
			</div>
		    </div>
		</div>
		<div class="b-user__portfolio">
		    <div class="b-title">Портфолио</div>
		    <div class="b-user__portfolio__content">
			<?php foreach ($mUser->images as $item) { ?>
			<div class="b-user__portfolio__item">
			    <img src="<?= $item->name ?>" alt="">
			</div>
			<?php } ?>
			<?php if($mUser->owner) { ?>
			<span 
			    class="b-user__portfolio__edit modalView"
			    data-url="<?= Url::toRoute("users/editportfolio") ?>"></span>
			<?php } ?>
		    </div>
		    <span class="b-user__portfolio__more open">
			<span>Свернуть</span>
		    </span>
		</div>
	    </div>
	    <!-- end b-user -->

	    <!-- begin b-marks -->
	    <?= MarksWidget::widget(['model' => $mUser]); ?>
	    <!-- end b-marks -->


	    <!-- begin b-comments -->
	    <?= TestimonialsWidget::widget([
		'model' => $mUser
	    ]); ?>
	    <!-- end b-comments -->

	</div>
	<!-- end b-content -->

	<!-- begin b-sidebar -->
	<aside class="b-sidebar">

	    <!-- begin b-diagramm -->
	    <div class="b-diagramm b-block">
		<div class="b-title">Диаграмма оценок</div>
		<div class="b-diagramm__content">
		    <?= MarksDiagramWidget::widget([
			'model' => $mUser
		    ]); ?>
		</div>
	    </div>
	    <!-- end b-diagramm -->

	    <!-- begin b-last-marks -->
	    <div class="b-last-marks b-block">
		<div class="b-title">Последние оценки</div>
		<div class="b-last-marks__content">
		    <div class="b-last-marks__item">
			<div class="b-last-marks__item__image">
			    <img src="/images/users/1.jpg" alt="">
			</div>
			<div class="b-last-marks__item__content">
			    <div class="b-last-marks__item__name">
				Yurii Diachenko
			    </div>
			    <div class="b-last-marks__item__date">
				19.12.2016
			    </div>
			    <div class="b-last-marks__item__category">
				Работа:
			    </div>
			    <div class="b-last-marks__item__value">
				9.6
			    </div>
			</div>
		    </div>
		    <div class="b-last-marks__item">
			<div class="b-last-marks__item__image">
			    <img src="/images/users/2.jpg" alt="">
			</div>
			<div class="b-last-marks__item__content">
			    <div class="b-last-marks__item__name">
				David dox-diamond
			    </div>
			    <div class="b-last-marks__item__date">
				12.12.2016
			    </div>
			    <div class="b-last-marks__item__category">
				Отношения:
			    </div>
			    <div class="b-last-marks__item__value">
				9.1
			    </div>
			</div>
		    </div>
		    <div class="b-last-marks__item">
			<div class="b-last-marks__item__image">
			    <img src="/images/users/3.jpg" alt="">
			</div>
			<div class="b-last-marks__item__content">
			    <div class="b-last-marks__item__name">
				Kris Martin
			    </div>
			    <div class="b-last-marks__item__date">
				9.12.2016
			    </div>
			    <div class="b-last-marks__item__category">
				Бизнес:
			    </div>
			    <div class="b-last-marks__item__value">
				8.7
			    </div>
			</div>
		    </div>
		    <div class="b-last-marks__item">
			<div class="b-last-marks__item__image">
			    <img src="/images/users/4.jpg" alt="">
			</div>
			<div class="b-last-marks__item__content">
			    <div class="b-last-marks__item__name">
				Amanda Mcwilliam
			    </div>
			    <div class="b-last-marks__item__date">
				8.12.2016
			    </div>
			    <div class="b-last-marks__item__category">
				Семья:
			    </div>
			    <div class="b-last-marks__item__value">
				9.9
			    </div>
			</div>
		    </div>
		    <div class="b-last-marks__item">
			<div class="b-last-marks__item__image">
			    <img src="/images/users/5.jpg" alt="">
			</div>
			<div class="b-last-marks__item__content">
			    <div class="b-last-marks__item__name">
				Engineer, Supervisor
			    </div>
			    <div class="b-last-marks__item__date">
				5.12.2016
			    </div>
			    <div class="b-last-marks__item__category">
				Здоровье:
			    </div>
			    <div class="b-last-marks__item__value">
				9.4
			    </div>
			</div>
		    </div>
		    <div class="link">
			<a href="#"><span>Посмотреть всех</span></a>
		    </div>
		</div>
	    </div>
	    <!-- end b-last-marks -->

	    <!-- begin b-trusted-users -->
	    <div class="b-trusted-users b-block">
		<div class="b-title">Последние оценки</div>
		<div class="b-trusted-users__content">
		    <div class="b-trusted-users__item">
			<div class="b-trusted-users__item__image">
			    <img src="/images/users/1.jpg" alt="">
			</div>
			<div class="b-trusted-users__item__content">
			    <div class="b-trusted-users__item__name">
				Yurii Diachenko
			    </div>
			    <div class="b-trusted-users__item__place">
				Lviv, Ukraine
			    </div>
			    <div class="b-tags">
				<span>Mobile UI design</span>
			    </div>
			</div>
		    </div>
		    <div class="b-trusted-users__item">
			<div class="b-trusted-users__item__image">
			    <img src="/images/users/2.jpg" alt="">
			</div>
			<div class="b-trusted-users__item__content">
			    <div class="b-trusted-users__item__name">
				David dox-diamond
			    </div>
			    <div class="b-trusted-users__item__place">
				Kyiv, Ukraine
			    </div>
			    <div class="b-tags">
				<span>Web design</span>
			    </div>
			</div>
		    </div>
		    <div class="b-trusted-users__item">
			<div class="b-trusted-users__item__image">
			    <img src="/images/users/3.jpg" alt="">
			</div>
			<div class="b-trusted-users__item__content">
			    <div class="b-trusted-users__item__name">
				Kris Martin
			    </div>
			    <div class="b-trusted-users__item__place">
				Lviv, Ukraine
			    </div>
			    <div class="b-tags">
				<span>User Experience Design</span>
			    </div>
			</div>
		    </div>
		    <div class="b-trusted-users__item">
			<div class="b-trusted-users__item__image">
			    <img src="/images/users/4.jpg" alt="">
			</div>
			<div class="b-trusted-users__item__content">
			    <div class="b-trusted-users__item__name">
				Amanda Mcwilliam
			    </div>
			    <div class="b-trusted-users__item__place">
				Kyiv, Ukraine
			    </div>
			    <div class="b-tags">
				<span>Mobile UI design</span>
			    </div>
			</div>
		    </div>
		    <div class="b-trusted-users__item">
			<div class="b-trusted-users__item__image">
			    <img src="/images/users/5.jpg" alt="">
			</div>
			<div class="b-trusted-users__item__content">
			    <div class="b-trusted-users__item__name">
				Engineer, Supervisor
			    </div>
			    <div class="b-trusted-users__item__place">
				Kyiv, Ukraine
			    </div>
			    <div class="b-tags">
				<span>Adobe Photoshop</span>
			    </div>
			</div>
		    </div>
		    <div class="link">
			<a href="#"><span>Посмотреть всех</span></a>
		    </div>
		</div>
	    </div>
	    <!-- end b-trusted-users -->

	</aside>
	<!-- end b-sidebar -->

    </div>
</div>