<?php

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Country;
use frontend\models\User;

$contr = Yii::$app->controller->id;
$act = Yii::$app->controller->action->id;

if(Yii::$app->user->id !== NULL) {
    $mUser = User::getProfile();
    if($mUser->step != 0) {
	$urlPath = "registration/step".$mUser->step."?type=".$mUser->type;
	$this->registerJs("showModal('".Url::toRoute([$urlPath])."', 1, 1)");
    }
}

$this->registerJs('
	$("#countrySelect").on("change", function() {
	    $("[name=\"csrf-token\"]").attr("content");
	    $.get("' . Url::toRoute(['site/setcountry']) . '", {id:$(this).val()}, function() {
		location.reload(true);
	    });
	});
	$(".showModal").on("click", function() {
	    showModal($(this).attr("data-url"), 0, 1);
	    return false;
	});
	function setCityList (id) {
	    csrf = $("[name=\"csrf-token\"]").attr("content");
	    url = "' . Url::toRoute("users/getcities") . '";
	    $.post(url, {"_csrf-frontend":csrf, "id":id}, function(data) {
		$("#user-city_id").html(data);
	    });
	}
', yii\web\View::POS_END);

$msg = Yii::$app->notification->get('global');
if($msg != FALSE) {
    $this->registerJs("alertInfo('".$msg."');", yii\web\View::POS_END);
}

$this->registerJsFile("/js/jquery2.2.4.js", ['position' => \yii\web\View::POS_HEAD]);
$session = Yii::$app->session;
$country = $session->get("country", 9908);

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title><?= $this->title ?></title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?= Html::csrfMetaTags() ?>
	<?php $this->head() ?>
    </head>
    <body class="gray-bg">
	<?php $this->beginBody() ?>
	<div id="container">

	    <!-- begin b-header -->
	    <header class="b-header">
		<div class="b-header__top">
		    <div class="container">
			<div class="row">
			    <?= $this->render("_topHeader"); ?>
			    <div class="col-xs-12 col-sm-6">
				<div class="b-header__region">
				    <div class="b-header__region__language">
					<div class="b-header__region__language__select">
					    <select>
						<option value="ru">Ru</option>
						<option value="en">En</option>
					    </select>
					</div>
				    </div>
				    <div class="b-header__region__country">
					<span>Ваша страна</span>
					<div class="b-header__region__country__select">
					    <?= Html::dropDownList("country", $country, Country::getList(), ['id' => 'countrySelect']) ?>
					</div>
				    </div>
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<div class="b-header__content" style="background-image: url('/images/b-header-content/1.jpg');">
		    <div class="b-header__nav">
			<div class="container">
			    <div class="row">
				<div class="col-xs-3">
				    <a href="/" class="b-logo">
					<h1 class="b-logo__content">
					    <img src="/images/logo.png" alt="">
					</h1>
				    </a>
				</div>
				<div class="col-xs-9">

				    <!-- begin b-menu -->
				    <nav class="b-menu" data-mobileMenu="container">
					<span class="b-menu__icon" data-mobileMenu="icon">
					    <i class="b-menu__line b-menu__line_1"></i>
					    <i class="b-menu__line b-menu__line_2"></i>
					    <i class="b-menu__line b-menu__line_3"></i>
					</span>
					<div class="b-menu__content">
					    <?=
					    \yii\widgets\Menu::widget([
						'items' => [
						    ['label' => Yii::t('app','HOME'), 'url' => ['site/index']],
						    ['label' => Yii::t('app','ABOUT'), 'url' => ['/page/aboutus']],
						    ['label' => Yii::t('app','ARTICLES'), 'url' => ['article/index']],
						    ['label' => Yii::t('app','BALANCE'), 'url' => "#"],
						    ['label' => Yii::t('app','HELP'), 'url' => ['/page/help']],
						    ['label' => Yii::t('app','CONTACTS'), 'url' => ['/page/contacts']],
						    ['label' => Yii::t('app','LEGALINFO'), 'url' => ['/page/legalinfo']],
						],
					    ]);
					    ?>
					</div>
				    </nav>
				    <!-- end b-menu -->

				</div>
			    </div>
			</div>
		    </div>
		    <?= ($contr == 'site' && $act == 'index') ? $this->render("_beginAuth") : Null; ?>
		    <?= ($contr == 'users' && $act == 'search') ? $this->render("_search") : Null ?>
		</div>
	    </header>
	    <!-- end b-header -->
	    <?= $content ?>	

	</div>

	<?= $this->render("_footer"); ?>
	<?= $this->render("_modal"); ?>
	<?= $this->render("_alerts"); ?>

	<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>