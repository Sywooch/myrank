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
				<span class="b-user__data__name__edit"></span>
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
			<div class="b-tags">
			    <span>Web design</span>
			    <span>User Experience Design</span>
			    <span>Mobile UI design</span>
			    <span>Adobe Photoshop</span>
			</div>
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
			<span class="b-user__data__name__edit"></span>
		    </div>
		    <div class="b-user__info__content">
			<div class="b-user__info__text">
			    <p><?= $mUser->about ?></p>
			</div>
			<div class="b-user__info__list">
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Специализация
					</div>
					<div class="b-user__info__list__item__text">
					    Facebook management
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Номер телефона
					</div>
					<div class="b-user__info__list__item__text">
					    <a href="tel:0443332211">044 333 22 11</a>
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Количество сотрудников
					</div>
					<div class="b-user__info__list__item__text">
					    100 - 500
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Дата рагистрации компании
					</div>
					<div class="b-user__info__list__item__text">
					    20.12.1986
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Ежегодный оборот компании
					</div>
					<div class="b-user__info__list__item__text">
					    1 млн руб - 5 млн руб
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Директор
					</div>
					<div class="b-user__info__list__item__text">
					    Степаненко Сергей Георгиевич
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Контактное лицо, ФИО
					</div>
					<div class="b-user__info__list__item__text">
					    Сыромятников Виталий Викторович
					</div>
				    </div>
				</div>
			    </div>
			    <div class="b-user__info__list__col">
				<div class="b-user__info__list__item">
				    <div class="b-user__info__list__item__content">
					<div class="b-user__info__list__item__title">
					    Контактное лицо, должность
					</div>
					<div class="b-user__info__list__item__text">
					    Менеджер
					</div>
				    </div>
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<?php if(count($mUser->images) > 0) { ?>
		<div class="b-user__portfolio">
		    <div class="b-title">Портфолио</div>
		    <div class="b-user__portfolio__content">
			<?php foreach ($mUser->images as $item) { ?>
			<div class="b-user__portfolio__item">
			    <img src="<?= $item->name ?>" alt="">
			</div>
			<?php } ?>
			<span class="b-user__portfolio__edit"></span>
		    </div>
		    <span class="b-user__portfolio__more open">
			<span>Свернуть</span>
		    </span>
		</div>
		<?php } ?>
	    </div>
	    <!-- end b-user -->

	    <!-- begin b-marks -->
	    <div class="b-marks b-block">
		<div class="b-title">
		    Оценки
		</div>
		<div class="b-marks__content">
		    <?php if (!isNull($mUser->mark)) { ?>
		    <div class="b-marks__item">
			<div class="b-marks__item__header">
			    <div class="b-marks__item__header__text">
				<div class="b-marks__item__header__icon"></div>
				<span>Работа</span>
			    </div>
			    <div class="b-marks__item__header__line">
			    </div>
			    <div class="b-marks__item__header__number">
				9.6
			    </div>
			</div>
			<div class="b-marks__item__content">
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Исполнительность
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="8.1">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Обучаемость
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="7.3">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Целеустремленность
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="9.2">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Пунктуальность
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="6.7">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Точность выполнения задач
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="0">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Качество работы
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="0">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Скорость работы
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="4.2">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Умение работать в команде
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="9.8">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Умение управлять командой
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="7.7">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			    <div class="b-marks__item__content__row">
				<div class="b-marks__item__content__text">
				    Организаторские способности
				</div>
				<div class="b-marks__item__content__slider">
				    <div class="b-marks__item__content__slider__amount">
					<input type="text" class="marks-slider-amount" value="9.6">
				    </div>
				    <div class="b-marks__item__content__slider__content">
					<div class="marks-slider"></div>
				    </div>
				</div>
			    </div>
			</div>
		    </div>
		    <?php } ?>
		</div>
		<div class="b-marks__button">
		    <a class="button-small" href="#">Сохранить оценку</a>
		</div>

	    </div>
	    <!-- end b-marks -->


	    <!-- begin b-comments -->
	    <div class="b-comments b-block">
		<div class="b-title">
		    Отзывы
		    <a class="button-small" href="#">Оставить отзыв</a>
		</div>
		<div class="b-comments__content">
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
		    <div class="b-comments__item">
			<div class="b-comments__item__image">
			    <img src="/images/users/4.jpg" alt="">
			    <div class="b-comments__item__number">
				978
			    </div>
			</div>
			<div class="b-comments__item__info">
			    <div class="b-comments__item__date">
				5.12.2016
			    </div>
			    <div class="b-comments__item__smile b-comments__item__smile_negative"></div>
			    <div class="b-comments__item__actions">
				<a href="#">Ответить</a>
				<a href="#">Пожаловаться</a>
			    </div>
			</div>
			<div class="b-comments__item__content">
			    <div class="b-comments__item__title">
				Доволен сотрудничеством
			    </div>
			    <div class="b-comments__item__name">
				Денис Пашков
			    </div>
			    <div class="b-comments__item__post">
				Менеджер
			    </div>
			    <div class="b-comments__item__text">
				<p>
				    Далеко-далеко за словесными горами в
				    стране гласных и согласных живут рыбные
				    тексты. Вдали от всех живут они в буквенных
				    домах на берегу Семантика большого
				    языкового океана.
				</p>
			    </div>
			    <div class="b-comments__item__answer">
				<div class="b-comments__item__answer__image">
				    <img src="/images/users/5.jpg" alt="">
				</div>
				<div class="b-comments__item__answer__text">
				    <p>
					Спасибо за эти замечательные
					слова! надеюсь поработать вместе
					еще не раз!
				    </p>
				</div>
			    </div>
			</div>
		    </div>
		    <div class="b-comments__item">
			<div class="b-comments__item__image">
			    <img src="/images/users/3.jpg" alt="">
			    <div class="b-comments__item__number">
				978
			    </div>
			</div>
			<div class="b-comments__item__info">
			    <div class="b-comments__item__date">
				5.12.2016
			    </div>
			    <div class="b-comments__item__smile b-comments__item__smile_neutral"></div>
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
				Анна Скрынник
			    </div>
			    <div class="b-comments__item__post">
				Рекрутер
			    </div>
			    <div class="b-comments__item__text">
				<p>
				    Далеко-далеко за словесными горами в
				    стране гласных и согласных живут рыбные
				    тексты.
				</p>
			    </div>
			</div>
		    </div>
		    <div class="b-comments__button-more">
			<span class="b-comments__button-more__default">БОЛЬШЕ</span>
			<span class="b-comments__button-more__loading"></span>
		    </div>
		</div>
	    </div>
	    <!-- end b-comments -->

	</div>
	<!-- end b-content -->

	<!-- begin b-sidebar -->
	<aside class="b-sidebar">

	    <!-- begin b-diagramm -->
	    <div class="b-diagramm b-block">
		<div class="b-title">Диаграмма оценок</div>
		<div class="b-diagramm__content">
		    <img src="/images/b-diagramm.jpg" alt="">
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