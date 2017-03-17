<?php
use frontend\widgets\user\MarksWidget;
use frontend\widgets\user\MarksDiagramWidget;
use frontend\widgets\user\UserInfoWidget;
use frontend\widgets\user\TestimonialsWidget;
use yii\helpers\Url;
use frontend\widgets\user\LatestMarksWidget;
use frontend\widgets\user\UserTrusteesWidget;

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
			    <img src="<?= $mUser->userImage ?>" alt="">
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
				<?php if(!$mUser->owner && (Yii::$app->user->id !== NULL)) { ?>
				<a class="b-user__data__info__add-trusted" href="#" data-url="<?= Url::toRoute(['users/trustees', 'id' => $mUser->id]) ?>">
				    <?= $mUser->trustUser ? "Доверенный" : "В доверенные" ?>
				</a>
				<?php } ?>
				<div class="b-user__data__info__rating">
				    <span><?= $mUser->rating ?></span>
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
			    <?php if(isset($mUser->company_name) && ($mUser->company_name != "")) { ?>
			    <div class="b-user__data__content__item">
				<div class="b-user__data__content__item__work">
				    <?= $mUser->company_name ?>
				</div>
			    </div>
			    <?php } ?>
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
				<?= $mUser->getUserTrusteesFrom()->count() ?>
			    </div>
			    <!-- div class="b-user__stats__item__new-number">
				1
			    </div -->
			</div>
		    </div>
		    <div class="b-user__stats__item">
			<div class="b-user__stats__item__content">
			    <div class="b-user__stats__item__icon b-user__stats__item__icon_2"></div>
			    <div class="b-user__stats__item__text">Оценок:</div>
			    <div class="b-user__stats__item__number"><?= $mUser->getUserMarksTo()->count(); ?></div>
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
				<?= $mUser->getTestimonials()->andWhere(['parent_id' => 0])->count() ?>
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
	    <?=
	    MarksDiagramWidget::widget([
		'model' => $mUser
	    ]);
	    ?>
	    <!-- end b-diagramm -->

	    <!-- begin b-last-marks -->
	    <?= LatestMarksWidget::widget([
		'model' => $mUser
	    ]); ?>
	    <!-- end b-last-marks -->

	    <!-- begin b-trusted-users -->
	    <?= UserTrusteesWidget::widget([
		'model' => $mUser
	    ]); ?>
	    <!-- end b-trusted-users -->

	</aside>
	<!-- end b-sidebar -->

    </div>
</div>
<?php
$this->registerJs("
    $('.b-user__data__info__add-trusted').on('click', function() {
	var that = $(this);
	url = $(this).attr('data-url');
	$.post(url, {'_csrf-frontend':$('[name=\"csrf-token\"]').attr('content')}, function(out) {
	    if(out.code) {
		that.text(out.data);
	    }
	}, 'json');
    })", yii\web\View::POS_END);

?>