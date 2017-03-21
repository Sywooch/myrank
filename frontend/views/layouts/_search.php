<?php

use frontend\models\UsersSearch;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

$mSearch = new UsersSearch();
$post = Yii::$app->request->post();
$get['UsersSearch'] = \Yii::$app->request->get();
$req = array_merge($get, $post);

$mSearch->load($req);


$city = Yii::$app->userinfo->getCityArr();
?>
<div class="container">

    <div class="b-header__title">
	Оцените надежность, честность и профессионализм
	потенциального партнера или контрагента.
    </div>

    <div class="b-header__bottom">
	<div class="b-header__search">
	    <?php
	    $form = ActiveForm::begin([
			'options' => ['id' => 'searchForm'],
			'action' => Url::toRoute(['users/search']),
			'method' => 'POST',
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
			<span>Найти</span>
			<?=
				$form->field($mSearch, 'searchName')
				->input('text', [
				    'placeholder' => 'Введите имя или специалиста',
				    'class' => 'input-text',
				    'id' => 'userChoose'
				])->label(FALSE)
			?>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-3">
		    <div class="b-header__search__col">
			<span>Регион</span>
			<div class="b-header__search__select">
			    <?= $form->field($mSearch, 'city_id')->dropDownList($city)->label(false) ?>
			</div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-3">
		    <div class="b-header__search__col">
			<div class="b-header__search__button">
			    <?= Html::submitButton("поиск", ['class' => 'button-submit']) ?>
			    <!-- span><a href="#">Расширенный поиск</a></span -->
			</div>
		    </div>
		</div>
	    </div>
	    <div class="b-header__search__advanced">
		<div class="row">
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span>Категория</span>
			    <div class="b-header__search__select">
				<?= $form->field($mSearch, "professionField")->dropDownList($mSearch->profList)->label(FALSE) ?>
			    </div>
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span>Рейтинг</span>
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
		<!-- div class="row">
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span>Должность</span>
			    <input class="input-text" type="text" placeholder="Любая">
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__advanced__col">
			    <span>Выберите кто вы:</span>
			</div>
			<div class="b-header__search__radio">
			    <div class="b-header__search__radio__item">
				<input type="radio" id="radio1" name="radio" checked/>
				<label for="radio1"><span></span>Компания</label>
			    </div>
			    <div class="b-header__search__radio__item">
				<input type="radio" id="radio2" name="radio"/>
				<label for="radio2"><span></span>Человек</label>
			    </div>
			</div>
		    </div>
		</div -->
	    </div>
<?php ActiveForm::end(); ?>
	</div>
    </div>
</div>
<?php
$this->registerJs('$("#userChoose").autocomplete({
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
