<div class="container">
    <div id="main">

	<!-- begin b-content -->
	<div class="b-content">

	    <div class="b-search b-block">
		<div class="b-search__header">
		    <div class="b-filter">
			<div class="row">
			    <div class="col-xs-12 col-sm-4">
				<div class="b-filter__text">
				    Найдено: <span><?= count($mSearch) ?></span> элемента
				</div>
			    </div>
			    <div class="col-xs-12 col-sm-8">
				<div class="b-filter__options">
				    <div class="b-filter__options__number">
					<ul>
					    <li class="active"><a href="#">По 10 шт</a></li>
					    <li><a href="#">По 20 шт</a></li>
					</ul>
				    </div>
				    <!-- div class="b-filter__options__select">
					<select>
					    <option value="">Рейтинг</option>
					    <option value="">Рейтинг</option>
					    <option value="">Рейтинг</option>
					</select>
				    </div -->
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<?= $this->render("searchResult", ['model' => $mSearch]) ?>
	    </div>

	</div>
	<!-- end b-content -->

	<!-- begin b-sidebar -->
	<aside class="b-sidebar">

	    <!-- begin b-trusted-users -->
	    <div class="b-trusted-users b-block">
		<div class="b-title">Лучший рейтинг</div>
		<div class="b-trusted-users__content">
		    <div class="b-trusted-users__item">
			<div class="b-trusted-users__item__image">
			    <img src="images/users/1.jpg" alt="">
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
			    <img src="images/users/2.jpg" alt="">
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
			    <img src="images/users/3.jpg" alt="">
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
			    <img src="images/users/4.jpg" alt="">
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
			    <img src="images/users/5.jpg" alt="">
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