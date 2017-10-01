<?php

use yii\widgets\ListView;
use frontend\widgets\user\LatestUsersAddWidget;
use frontend\widgets\user\BestRatingWidget;
use frontend\models\Profession;
use yii\helpers\Url;
use frontend\models\User;

$this->title = 'MyRank.com';
?>

<!-- begin b-category -->
<div class="b-category">
    <div class="container">
	<h2>
        <?= \Yii::t('app','TOP_CATEGORIES'); ?>
	</h2>
	<div class="b-category__content">
	    <div class="row">
		<?php foreach ($mProf as $key => $item) { ?>
		    <?php if (($key == 0) || ($key % 13) == 0) { ?>
			<div class="col-xs-12 col-sm-6 col-md-3">
			    <ul>
			    <?php } ?>
                                <li>
				    <a href="<?= Url::toRoute(['users/search', 'UsersSearch' => ['professionField' => $item['id']]]) ?>">
					<?= $item['title'] ?>
				    </a>
				</li>
                                <?php if($key == 6) { ?><li class='viewAll'><a href="#">Показать все</a></li><?php } ?>
			    <?php if ((($key + 1) % 13 == 0) || (count($mProf) == $key+1)) { ?>
			    </ul>
			</div>
		    <?php } ?>
		<?php } ?>
	    </div>
	</div>
    </div>
</div>
<!-- end b-category -->

<!-- begin b-rating -->
<?= BestRatingWidget::widget(['type' => 'user']); ?>
<!-- end b-rating -->

<!-- begin b-rating -->
<?= BestRatingWidget::widget(['type' => 'company']); ?>
<!-- end b-rating -->


<!-- begin b-info -->
<div class="b-info">
    <div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-6">
		<div class="b-info__about">
		    <h2><?= \Yii::t('app','LITTLE_ABOUT_THE_PROJECT'); ?></h2>
		    <div class="b-info__about__content"><?= \Yii::t('app','LITTLE_ABOUT_THE_PROJECT_TEXT'); ?></div>
		</div>
	    </div>
	    <div class="col-xs-12 col-sm-6">
		<div class="b-info__how-work">
		    <h2><?= \Yii::t('app','HOW_SERVICE_WORK'); ?></h2>
		    <div class="b-info__how-work__content">
			<ul>
			    <li><span class="b-info__how-work__icon b-info__how-work__icon_1"></span>
				<span class="b-info__how-work__text"><?= \Yii::t('app','HOW_SERVICE_WORK_TEXT_1'); ?></span>
			    </li>
			    <li>
				<span class="b-info__how-work__icon b-info__how-work__icon_2"></span>
				<span class="b-info__how-work__text"><?= \Yii::t('app','HOW_SERVICE_WORK_TEXT_2'); ?></span>
			    </li>
			    <li>
				<span class="b-info__how-work__icon b-info__how-work__icon_3"></span>
				<span class="b-info__how-work__text"><?= \Yii::t('app','HOW_SERVICE_WORK_TEXT_3'); ?></span>
			    </li>
			    <li>
				<span class="b-info__how-work__icon b-info__how-work__icon_4"></span>
				<span class="b-info__how-work__text"><?= \Yii::t('app','HOW_SERVICE_WORK_TEXT_4'); ?></span>
			    </li>
			    <li>
				<span class="b-info__how-work__icon b-info__how-work__icon_5"></span>
				<span class="b-info__how-work__text"><?= \Yii::t('app','HOW_SERVICE_WORK_TEXT_5'); ?></span>
			    </li>
			    <li>
				<span class="b-info__how-work__icon b-info__how-work__icon_6"></span>
				<span class="b-info__how-work__text"><?= \Yii::t('app','HOW_SERVICE_WORK_TEXT_6'); ?></span>
			    </li>
			</ul>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
<!-- end b-info -->


<!-- begin b-articles -->
<?php
echo ListView::widget([
    'dataProvider' => $listDataProvider,
    'itemView' => '_listArticles',
    'layout' => '{items}',
    'emptyText' =>
        '<p></p><h2>'.\Yii::t('app','NEWS').'</h2>'.
             '<p>'.\Yii::t('app','NO_ARTICLES').'</p>',
    'emptyTextOptions' => [
	//'tag' => 'p'
    ],
]);
?>
<!-- end b-articles -->

<?php if(Yii::$app->user->id === NULL) { ?>
<!-- begin b-reg-now -->
<div class="b-reg-now">
    <div class="container">
	<div class="b-reg-now__content">
	    <div class="b-reg-now__text">
            <?= \Yii::t('app','REGISTER_AND_GET_FULL_ACCESS_TO_ALL_FEATURES'); ?>
	    </div>
	    <div class="b-reg-now__buttons">
		<a href="#"
		   class="button regstep" 
		   data-url="<?= Url::toRoute(['registration/step1', 'type' => User::TYPE_USER_USER]) ?>"><?= \Yii::t('app','IAM_USER'); ?></a>
		<a href="#" 
		   class="button regstep"
		   data-url="<?= Url::toRoute(['registration/step1', 'type' => User::TYPE_USER_COMPANY]) ?>"><?= \Yii::t('app','WEARE_COMPANY'); ?></a>
	    </div>
	</div>
    </div>
</div>
<!-- end b-reg-now -->
<?php } ?>

<!-- begin b-last-users -->
<?= LatestUsersAddWidget::widget(); ?>
<!-- end b-last-users -->
