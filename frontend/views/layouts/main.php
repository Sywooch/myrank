<?php
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Html;

AppAsset::register($this);

$this->registerJs("https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js", yii\web\View::POS_END);
$this->registerJs("@web/bootstrap/js/bootstrap.min.js", yii\web\View::POS_END);
$this->registerJs("/js/owlcarousel/owl.carousel.min.js", yii\web\View::POS_END);
$this->registerJs("/js/jquery-ui/jquery-ui.min.js", yii\web\View::POS_END);
$this->registerJs("/js/jquery.ui.touch-punch.min.js", yii\web\View::POS_END);
$this->registerJs("/js/inputmask/inputmask.min.js", yii\web\View::POS_END);
$this->registerJs("/js/inputmask/inputmask.phone.extensions.min.js", yii\web\View::POS_END);
$this->registerJs("/js/inputmask/jquery.inputmask.min.js", yii\web\View::POS_END);
$this->registerJs("//cloud.tinymce.com/stable/tinymce.min.js", yii\web\View::POS_END);
$this->registerJs("/js/script.js", yii\web\View::POS_END);

$this->registerCssFile("https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800&amp;subset=cyrillic,cyrillic-ext");
$this->registerCssFile("@web/bootstrap/css/bootstrap.min.css");
$this->registerCssFile("@web/js/owlcarousel/owl.carousel.min.css");
$this->registerCssFile("@web/css/style.css");
$this->registerCssFile("@web/css/responsive.css");

$contr = Yii::$app->controller->id;
$act = Yii::$app->controller->action->id;
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
<body>
    <?php $this->beginBody() ?>
    <div id="container">

        <!-- begin b-header -->
        <header class="b-header">
            <div class="b-header__top">
                <div class="container">
                    <div class="row">
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
                                        <select>
                                            <option value="ukr">Украина</option>
                                            <option value="rus">Россия</option>
                                        </select>
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
                                <a href="#" class="b-logo">
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
                                        <ul>
                                            <li class="active"><a href="#">главная</a></li>
                                            <li><a href="#">о нас</a></li>
                                            <li><a href="#">новости</a></li>
                                            <li><a href="#">баланс</a></li>
                                            <li><a href="#">помощь</a></li>
                                            <li><a href="#">контакты</a></li>
                                            <li><a href="#">условия & защита</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <!-- end b-menu -->

                            </div>
                        </div>
                    </div>
                </div>
		<?= ($contr == 'site' && $act == 'index') ? $this->render("_beginAuth") : Null; ?>
            </div>
        </header>
        <!-- end b-header -->
	<?= $content ?>

    </div>

    <?= $this->render("_footer"); ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>