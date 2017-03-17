<?php

use yii\helpers\Url;
use frontend\models\Country;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\UsersSearch;

$city = Yii::$app->userinfo->getCityArr();

$mSearch = new UsersSearch();
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
    			<?= $form->field($mSearch, 'searchName')
    			    ->input('text', [
    				'placeholder' => 'Введите имя или специалиста',
    				'class' => 'input-text',
    				'id' => 'userChoose'
    			    ])->label(FALSE) ?>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-3">
		    <div class="b-header__search__col">
			<span>Регион</span>
			<div class="b-header__search__select">
			    <?= $form->field($mSearch, 'city_id')->dropDownList($city)->label(FALSE); ?>
			</div>
		    </div>
		</div>
		<div class="col-xs-12 col-sm-3">
		    <div class="b-header__search__col">
			<div class="b-header__search__button">
			    <?= Html::submitButton('поиск', ['class' => 'button-submit']) ?>
			    <!-- span><a href="#">Расширенный поиск</a></span -->
			</div>
		    </div>
		</div>
	    </div>
	    <?php ActiveForm::end() ?>
	    <!-- /form -->
	</div>
	<?php if (Yii::$app->user->id === NULL) { ?>
    	<div class="b-header__profile">
    	    <span>Выберите ваш профиль</span>
    	    <ul class="nav-tabs">
    		<li class="active">
    		    <a href="#tab-content_1" data-toggle="tab">
    			Я пользователь
    		    </a>
    		</li>
    		<li>
    		    <a href="#tab-content_2" data-toggle="tab">
    			Я компания
    		    </a>
    		</li>
    	    </ul>
    	    <div class="tab-content">
    		<div class="tab-pane active" id="tab-content_1">
    		    <div class="b-header__profile__title">
    			Зарегистрируйтесь или войдите черех социальные сети
    		    </div>
    		    <div class="b-header__profile__content">
    			<div class="b-header__profile__button">
    			    <a id="regstep" class="button" href="#">Регистрация</a>
    			</div>
    			<div class="b-header__profile__button">
    			    <a class="button signin" href="#">Вход</a>
    			</div>
    			<div class="b-social">
    			    <ul>
    				<li><a class="b-social__fb" href="<?= Url::toRoute(['site/auth', 'authclient' => 'facebook']) ?>"></a></li>
    				<li><a class="b-social__vk" href="<?= Url::toRoute(['site/auth', 'authclient' => 'vkontakte']) ?>"></a></li>
    				<li><a class="b-social__tw" href="#"></a></li>
    			    </ul>
    			</div>
    		    </div>
    		</div>
    		<div class="tab-pane" id="tab-content_2">
    		</div>
    	    </div>
    	</div>
	<?php } ?>
    </div>
</div>
<?php
$this->registerJs("var csrf = '" . Yii::$app->request->getCsrfToken() . "';
    $('#regstep').on('click', function () {
	url = '" . Url::toRoute("registration/step1") . "';
	showModal(url, '', 1);
	$('.country-select select').select2({
	    placeholder: 'Страна'
	});
	return false;
    });
    
    $('body').on('click', '.cancelLink', function() {
	$('#modalView').modal('toggle');
	return false;
    });
    $('#userChoose').autocomplete({
        source: function(request, response){
        	$.ajax({
                url: '".Url::toRoute(['users/userslist'])."',
                dataType: 'json',
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
    }
", \yii\web\View::POS_END);
?>