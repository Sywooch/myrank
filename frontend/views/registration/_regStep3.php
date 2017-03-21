<?php
use frontend\widgets\user\ModalWidget;
/*
echo ModalWidget::widget([
    'title' => 'Регистрация - Шаг 2<span> из 2</span>',
    'model' => $model,
    'content' => [
	'phone' => [
	    'label' => 'Номер телефона:',
	    'type' => 'textInput',
	    'options' => ['class' => 'input-text input-phone-company', 'placeholder' => '0 44 XXX XX XX'],
	]
    ]
]);*/
?>

<div class="b-modal">
    <form action="#">
	<div class="b-modal__header">
	    Регистрация - Шаг 2<span> из 2</span>
	</div>
	<div class="b-modal__content">
	    <div class="row">
		<div class="col-xs-12 col-sm-6">
		    <span>Номер телефона:</span>
		    <input type="text" class="input-text input-phone-company" placeholder="0 44 XXX XX XX">
		</div>
		<div class="col-xs-12 col-sm-6">
		    <span>Количество сотрудников:</span>
		    <div class="select-wrapper">
			<select>
			    <option value="">100 - 500</option>
			    <option value="">100 - 1000</option>
			    <option value="">100 - 1500</option>
			</select>
		    </div>
		</div>
	    </div>
	    <div class="row">
		<div class="col-xs-12 col-sm-6">
		    <span>Дата регистрации компании:</span>
		    <input type="text" class="input-text" placeholder="20.12.1986">
		</div>
		<div class="col-xs-12 col-sm-6">
		    <span>Количество сотрудников:</span>
		    <div class="select-wrapper">
			<select>
			    <option value="">1 000 000 руб - 5 000 000 руб</option>
			    <option value="">1 000 000 руб - 10 000 000 руб</option>
			    <option value="">1 000 000 руб - 15 000 000 руб</option>
			</select>
		    </div>
		</div>
	    </div>
	    <div class="row">
		<div class="col-xs-12">
		    <span>Директор:</span>
		    <input type="text" class="input-text" placeholder="ФИО">
		</div>
	    </div>
	    <div class="row">
		<div class="col-xs-12">
		    <span>Контактное лицо:</span>
		    <input type="text" class="input-text" placeholder="ФИО, должность">
		</div>
	    </div>
	    <div class="row">
		<div class="col-xs-12">
		    <span>Информация о компании</span>
		    <textarea placeholder="Расскажите немного о компании"></textarea>
		    <i>Расскажите о себе. Не больше 500 символов.</i>
		</div>
	    </div> 
	    <div class="input-file-wrapper">
		<span>Добавить портфолио</span>
		<input type="file">
	    </div> 
	    <div class="b-modal__content__buttons">
		<div class="b-modal__content__buttons__item">
		    <a class="button-small" href="#">Сохранить</a>
		</div>
		<div class="b-modal__content__buttons__item">
		    <span><a href="#">Пропустить</a></span>
		</div>
	    </div>
	</div>
    </form>
</div>