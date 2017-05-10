<?php
use frontend\models\User;
use yii\helpers\Url;

?>
<!-- begin b-footer -->
<footer class="b-footer">
    <div class="b-footer__content">
	<div class="container">
	    <div class="row">
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
		    <div class="b-footer__contact">
			<div class="b-footer__title"><?= \Yii::t('app', 'CONTACTS'); ?></div>
			<div class="b-footer__contact__item b-footer__contact__item_adress">
			    <span><?= \Yii::t('app', 'ADDRESS'); ?></span>
			    <?= \Yii::t('app', 'ADDRESS_INFO'); ?>
			</div>
			<div class="b-footer__contact__item b-footer__contact__item_phone">
			    <span><?= \Yii::t('app', 'PHONE_NUMBER'); ?></span>
			    <a href="tel:+6511112222">+65 1111 2222</a>
			</div>
			<div class="b-footer__contact__item b-footer__contact__item_email">
			    <span>Email</span>
			    <a href="mailto:info@myrank.com">info@myrank.com</a>
			</div>
			<div class="b-footer__contact__logo">
			    <a href="#" class="b-logo">
				<img src="/images/logo.png" alt="">
			    </a>
			</div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
		    <div class="b-footer__menu">
			<div class="b-footer__title"><?= \Yii::t('app', 'MENU'); ?></div>
			<?=
			\yii\widgets\Menu::widget([
			    'items' => [
				['label' => Yii::t('app', 'HOME'), 'url' => ['site/index']],
				['label' => Yii::t('app', 'ABOUT'), 'url' => ['/page/aboutus']],
				['label' => Yii::t('app', 'ARTICLES'), 'url' => ['article/index']],
				['label' => Yii::t('app', 'BALANCE'), 'url' => ['/page/balance']],
				['label' => Yii::t('app', 'HELP'), 'url' => ['/page/help']],
				['label' => Yii::t('app', 'CONTACTS'), 'url' => ['/page/contacts']],
				['label' => Yii::t('app', 'LEGALINFO'), 'url' => ['/page/legalinfo']],
			    ],
			]);
			?>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-6 col-sm-push-6 col-md-3 col-md-push-0 col-lg-3">
		    <div class="b-footer__services">
			<div class="b-footer__title"><?= \Yii::t('app', 'PROFILE_AND_SERVICES'); ?></div>
			<?=
			\yii\widgets\Menu::widget([
			    'items' => [
			    ['label' => \Yii::t('app', 'LOGOUT'), 'url' => ['site/logout'],
                    'visible' => (Yii::$app->user->id !== null)],
				['label' => \Yii::t('app', 'ENTER'), 'url' => ['#'],
                    'options'=>['class'=>'signin'], 'visible' => (Yii::$app->user->id === null)],
				['label' => \Yii::t('app', 'REGISTER'), 'url' => ['#'],
                    'options'=>['id'=>'registered'], 'visible' => 0], // ???
				['label' => \Yii::t('app', 'RESTORE_ACCESS'), 'url' => ['#'],
                    'options'=>['id'=>'rememberPass'], 'visible' => (Yii::$app->user->id === null)],
				['label' => \Yii::t('app', 'RECOMMENDATIONS_EXECUTOR'), 'url' => ['/page/recommendations_executor']],
				['label' => \Yii::t('app', 'RECOMMENDATIONS_CUSTOMER'), 'url' => ['/page/recommendations_customer']],
				['label' => \Yii::t('app', 'SITE_SEARCH'), 'url' => ['/users/search']],
				['label' => \Yii::t('app', 'PAID_OPTIONS_IN_PROJECTS'), 'url' => ['/page/paid_options_in_projects']],
				['label' => \Yii::t('app', 'SITE_ADS'), 'url' => ['/page/site_ads']],
				['label' => \Yii::t('app', 'PRIVACY_POLICY'), 'url' => ['/page/privacy-policy']],
			    ],
			]);
			?>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-6 col-sm-pull-6 col-md-3 col-md-pull-0 col-lg-3">
		    <div class="b-footer__social">
			<div class="b-footer__title"><?= \Yii::t('app', 'WE_ARE_IN_SOCIAL_NETWORKS'); ?></div>
			<div class="b-social">
			    <ul>
				<li><a class="b-social__fb" href="#"></a></li>
				<li><a class="b-social__vk" href="#"></a></li>
				<li><a class="b-social__tw" href="#"></a></li>
			    </ul>
			</div>
			<span><?= \Yii::t('app', 'ADD_TO_GROUPS_AND_WATCH_ALL_THE_LATEST_NEWS_AND_ANNOUNCEMENTS'); ?></span>
		    </div>
		</div>
	    </div>
	</div>
    </div>
    <div class="b-footer__bottom">
	<div class="container">
	    <div class="b-footer__copyright">
		<span>© 2015-2016 <?= \Yii::t('app', 'MYRANK_LTD_ALL_RIGHTS_RESERVED'); ?></span>
	    </div>
	</div>
    </div>
</footer>
<!-- end b-footer -->
<?php

$this->registerJs ("$('.signin').on('click', function () {
	url = '" . Url::toRoute("site/login") . "';
	var csrf = '" . Yii::$app->request->getCsrfToken() . "';
	showModal(url, '', 1);
	return false;
    });", \yii\web\View::POS_END);

?>
<script type="text/javascript">
    $("#rememberPass").on('click', function() {
        url = '<?= Url::toRoute(['site/requestpasswordreset']) ?>';
        showModal(url, 0, 1);
        return false;
    });
</script>

