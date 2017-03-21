<?php
use frontend\widgets\user\BestRatingWidget;
?>

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
	    <?= BestRatingWidget::widget([
		'tmpl' => 'search'
	    ]); ?>
	    <!-- end b-trusted-users -->

	</aside>
	<!-- end b-sidebar -->

    </div>
</div>