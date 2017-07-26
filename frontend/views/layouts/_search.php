<?php

use frontend\models\UsersSearch;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
//use frontend\models\UserConstant;

$mSearch = new UsersSearch();
$get = \Yii::$app->request->get();

$mSearch->load($get);

$city = Yii::$app->userinfo->getCityArr();
?>
<div class="container">

    <div class="b-header__title"><?= \Yii::t('app','MYRANK_SLOGAN'); ?></div>

    <div class="b-header__bottom">
	<div class="b-header__search">
	    <?php
	    $form = ActiveForm::begin([
			'options' => ['id' => 'searchForm'],
			'action' => Url::toRoute(['users/search']),
			'method' => 'GET',
			'fieldConfig' => [
			    'options' => [
				'tag' => false,
			    ],
			],
		    ])
	    ?>
	    <div class="row">
		<div class="col-xs-12 col-sm-6">
		    <div class="b-header__search__col ui-widget">
			<span><?= \Yii::t('app','FIND'); ?></span>
			<?=
				$form->field($mSearch, 'searchName')
				->input('text', [
				    'placeholder' => \Yii::t('app','ENTER_NAME_OR_SPECIALIST'),
				    'class' => 'input-text',
				    'id' => 'userChoose'
				])->label(FALSE)
			?>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-3">
		    <div class="b-header__search__col">
			<span><?= \Yii::t('app','REGION'); ?></span>
			<div class="b-header__search__select city-select">
			    <?= $form->field($mSearch, 'city_id')->dropDownList($city)->label(false) ?>
			</div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-3">
		    <div class="b-header__search__col">
			<div class="b-header__search__button">
			    <?= Html::submitButton(\Yii::t('app','SEARCH'), ['class' => 'button-submit']) ?>
			    <!-- span><a href="#">Расширенный поиск</a></span -->
			</div>
		    </div>
		</div>
	    </div>
	    <div class="b-header__search__advanced">
		<div class="row">
		    <!-- div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span>Должность</span>
			    <input class="input-text" type="text" placeholder="Любая">
			</div>
		    </div -->
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span>Выберите кого вы ищете:</span>
			</div>
			<div class="b-header__search__radio">
			    <div class="b-header__search__radio__item">
                                <?= Html::radio("UsersSearch[type]", 
                                        (isset($get['UsersSearch']['type']) && ($get['UsersSearch']['type'] == UsersSearch::TYPE_USER_COMPANY)) || !isset($get['UsersSearch']['type']), 
                                        ['id' => 'radio1', 'value' => UsersSearch::TYPE_USER_COMPANY]); ?>
				<label for="radio1"><span></span>Компания</label>
			    </div>
			    <div class="b-header__search__radio__item">
                                <?= Html::radio("UsersSearch[type]", (isset($get['UsersSearch']['type']) && ($get['UsersSearch']['type'] == UsersSearch::TYPE_USER_USER)), ['id' => 'radio2', 'value' => UsersSearch::TYPE_USER_USER]); ?>
				<label for="radio2"><span></span>Человек</label>
			    </div>
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span><?= \Yii::t('app','CATEGORY'); ?></span>
			    <div class="b-header__search__select">
				<?= $form->field($mSearch, "professionField")->dropDownList($mSearch->profList)->label(FALSE) ?>
			    </div>
			</div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-xs-12 col-sm-12">
			<div class="b-header__search__advanced__col">
			    <span><?= \Yii::t('app','RATING'); ?></span>
			    <div class="b-header__search__advanced__mark">
				<div class="b-header__search__advanced__mark__input">
				    <?= $form->field($mSearch, 'ratingStart')->input('text', ['class' => 'header-marks-slider-amount-min'])->label(FALSE) ?>
				</div>
				<div class="b-header__search__advanced__mark__field">
				    <div class="header-marks-slider"></div>
				</div>
				<div class="b-header__search__advanced__mark__input">
				    <?= $form->field($mSearch, 'ratingEnd')->input('text', ['class' => 'header-marks-slider-amount-max'])->label(FALSE) ?>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
<?php ActiveForm::end(); ?>
	</div>
    </div>
</div>
<?php
$this->registerJs('
$(".city-select select").select2();
$("#userChoose").autocomplete({
  source: function(request, response){
    $.ajax({
      url: "'.Url::toRoute(['users/userslist']).'",
      dataType: "json",
      data:{
        startsWith: request.term
      },
      success: function(data){
	console.log(data);
        response($.map(data.users, function(item){
          return{
            label: item.name,
            value: item.name
          }
        }));
      }
    });
  },
  minLength: 2
});
    jQuery.ui.autocomplete.prototype._resizeMenu = function () {
      var ul = this.menu.element;
      ul.outerWidth(this.element.outerWidth());
    }', \yii\web\View::POS_END);
?>
