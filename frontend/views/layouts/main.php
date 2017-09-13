<?php

use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Country;
use frontend\models\User;
use frontend\models\UserConstant;
use frontend\widgets\site\Breadcrumbs;
use frontend\models\GeoCountry;

$contr = Yii::$app->controller->id;
$act = Yii::$app->controller->action->id;

$session = Yii::$app->session;
if($session->has("country")) {
    $country = $session->get("country");
} else {
    $ip = Yii::$app->geoip->ip();
    $ip->isoCode;
    $mGeoCountry = GeoCountry::findOne(['code' => $ip->isoCode]);
    if(isset($mGeoCountry->id)) {
        $country = $mGeoCountry->country_id;
    }
}

if (Yii::$app->user->id !== NULL) {
    $mUser = User::getProfile();
    if ($mUser->step != 0) {
        $urlPath = "registration/step" . $mUser->step . "?type=" . $mUser->type;
        $this->registerJs("showModal('" . Url::toRoute([$urlPath]) . "', 1, 1)");
    }
}

$this->registerJs('
	$("#countrySelect").on("change", function() {
	    $("[name=\"csrf-token\"]").attr("content");
	    $.get("' . Url::toRoute(['site/setcountry']) . '", {id:$(this).val()}, function() {
		location.reload(true);
	    });
	});
	$("body").on("click", ".showModal", function() {
	    showModal($(this).attr("data-url"), 0, 1);
	    return false;
	});
	$("#changeLang").on("change", function() {
	    csrf = $("[name=\"csrf-token\"]").attr("content");
	    $.post("' . Url::toRoute(['site/changelang']) . '", {id:$(this).val(), "_csrf-frontend":csrf}, function() {
		location.reload(true);
	    });
	});
	$("body").on("click", ".cancel", function () {
	    $("#modalView").modal("hide");
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
if ($msg != FALSE) {
    $this->registerJs("alertInfo('" . $msg . "');", yii\web\View::POS_END);
}

$this->registerJsFile("/js/jquery2.2.4.js", ['position' => \yii\web\View::POS_HEAD]);


$lang = Yii::$app->params['lang'];

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
        <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
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
                                            <?= Html::dropDownList("lang", Yii::$app->language, $lang, ['id' => 'changeLang']) ?>
                                        </div>
                                    </div>
                                    <div class="b-header__region__country">
                                        <span><?= \Yii::t('app', 'YOUR_COUNTRY'); ?></span>
                                        <div class="b-header__region__country__select">
                                            <?= Html::dropDownList("country", $country, Country::getList(Yii::$app->language), ['id' => 'countrySelect']) ?>
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
                                                    ['label' => Yii::t('app', 'HOME'), 'url' => ['site/index']],
                                                    [
                                                        'label' => Yii::t('app', 'ABOUT'), 
                                                        'url' => ['static-pages/aboutus']
                                                    ],
                                                    ['label' => Yii::t('app', 'ARTICLES'), 'url' => ['article/index']],
                                                    [
                                                        'label' => Yii::t('app', 'BALANCE'), 
                                                        'url' => ['static-pages/balance']
                                                    ],
                                                    [
                                                        'label' => Yii::t('app', 'HELP'), 
                                                        'url' => ['static-pages/help']
                                                    ],
                                                    [
                                                        'label' => Yii::t('app', 'CONTACTS'), 
                                                        'url' => ['static-pages/contacts']
                                                    ],
                                                    [
                                                        'label' => Yii::t('app', 'LEGALINFO'), 
                                                        'url' => ['static-pages/legalinfo']
                                                    ],
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
            <?php
                if(isset($this->params['breadcrumbs'])) { 
                    echo Breadcrumbs::widget([
                        'links' => $this->params['breadcrumbs']
                    ]);
                }
            ?>
            <?= $content ?>	

        </div>

        <?= $this->render("_footer"); ?>
        <?= $this->render("_modal"); ?>
        <?= $this->render("_alerts"); ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>