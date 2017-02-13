<?php
use yii\helpers\Url;

?>
<div class="container">

    <div class="b-header__title">
	Оцените надежность, честность и профессионализм
	потенциального партнера или контрагента.
    </div>

    <div class="b-header__bottom">
	<div class="b-header__search">
	    <form action="#">
		<div class="row">
		    <div class="col-xs-12 col-sm-6">
			<div class="b-header__search__col">
			    <span>Найти</span>
			    <input class="input-text" type="text" placeholder="Введите имя или специалиста">
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-3">
			<div class="b-header__search__col">
			    <span>Регион</span>
			    <div class="b-header__search__select">
				<select>
				    <option value="">Сумы</option>
				    <option value="">Киев</option>
				    <option value="">Харьков</option>
				</select>
			    </div>
			</div>
		    </div>
		    <div class="col-xs-12 col-sm-3">
			<div class="b-header__search__col">
			    <div class="b-header__search__button">
				<input class="button-submit" type="submit" value="поиск">
				<span><a href="#">Расширенный поиск</a></span>
			    </div>
			</div>
		    </div>
		</div>
	    </form>
	</div>
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
			<div class="b-social">
			    <ul>
				<li><a class="b-social__fb" href="#"></a></li>
				<li><a class="b-social__vk" href="#"></a></li>
				<li><a class="b-social__tw" href="#"></a></li>
			    </ul>
			</div>
		    </div>
		</div>
		<div class="tab-pane" id="tab-content_2">
		</div>
	    </div>
	</div>
    </div>
</div>
<?php
$this->registerJs("$('#regstep').on('click', function() {"
	. "url = '".Url::toRoute("registration/step1")."';"
	. "csrf = '".Yii::$app->request->getCsrfToken()."';"
	. "showModal(url, '', csrf, 1);"
	. "$('.country-select select').select2({
			placeholder: \"Страна\"
		});"
	. "return false;"
	. "})", \yii\web\View::POS_END);
?>