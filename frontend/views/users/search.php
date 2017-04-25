<?php

use frontend\widgets\user\BestRatingWidget;
use yii\helpers\Url;

$getParam = Yii::$app->request->get();
//var_dump($getParam);
$params = $getParam;
if (isset($getParam['limit'])) {
    unset($getParam['UsersSearch']['limit']);
}
$params[] = 'users/search';
$viewList10 = $viewList20 = $params;
$viewList10['UsersSearch']['limit'] = 10;
$viewList20['UsersSearch']['limit'] = 20;

$this->title = "Поиск";
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
				    <?= \Yii::t('app', 'FOUND'); ?>: <span><?= $pagin['count'] ?></span> <?= \Yii::t('app', 'ITEMS'); ?>
				</div>
			    </div>
			    <div class="col-xs-12 col-sm-8">
				<div class="b-filter__options">
				    <div class="b-filter__options__number">
					<ul>
					    <li <?= $model->limit == 10 ? 'class="active"' : "" ?>>
						<a href="<?= Url::toRoute($viewList10) ?>"><?= \Yii::t('app', 'VIEW_LIST_10'); ?></a>
					    </li>
					    <li <?= $model->limit == 20 ? 'class="active"' : "" ?>>
						<a href="<?= Url::toRoute($viewList20) ?>"><?= \Yii::t('app', 'VIEW_LIST_20'); ?></a>
					    </li>
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
		<?= $this->render("searchResult", ['model' => $mSearch, 'pagin' => $pagin, 'USmodel' => $model]) ?>
	    </div>

	</div>
	<!-- end b-content -->

	<!-- begin b-sidebar -->
	<aside class="b-sidebar">

	    <!-- begin b-trusted-users -->
	    <?=
	    BestRatingWidget::widget([
		'tmpl' => 'search'
	    ]);
	    ?>
	    <!-- end b-trusted-users -->

	</aside>
	<!-- end b-sidebar -->

    </div>
</div>