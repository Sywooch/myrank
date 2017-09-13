<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-8"><?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?></div>
        <div class="col-lg-4"><?= Html::button("Транслитерация", ['id' => 'translit']); ?></div>
    
    </div>
    <?= $form->field($model, 'published')->checkbox(); ?>

    <?php
    /* echo $form->field($model, 'content')->textarea(['rows' => 6]) */
    echo $form->field($model, 'content')->widget(Widget::className(), [
	'settings' => [
	    'lang' => strtolower(substr(Yii::$app->language, 0, 2)), // 'ru'
	    'removeWithoutAttr' => [],
	    'minHeight' => 300,
	    'pastePlainText' => true,
	    'buttonSource' => true,
	    'replaceDivs' => false,
	    'plugins' => [
		'clips',
		'fullscreen',
		'fontfamily',
		'fontsize',
		'fontcolor',
		'video',
		'table',
		'imagemanager',
	    ],
	    'uploadOnlyImage' => false,
	    'validatorOptions' => ['maxSize' => 40000],
	    'imageUpload' => Yii::getAlias('@urlToImages'),
	    'imageManagerJson' => Yii::getAlias('@urlToImages'),
	    'fileManagerJson' => Yii::getAlias('@urlToImages'),
	    'fileUpload' => Yii::getAlias('@urlToImages'),
	//'selector' => 'staticpages-content',
	]
    ]);
    ?>

    <?= $form->field($model, 'locale')->dropDownList(Yii::$app->params['lang']) ?>

    <?= $form->field($model, 'title_browser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?php /* echo $form->field($model, 'create_time')->textInput() */ ?>

    <?php /* echo $form->field($model, 'update_time')->textInput() */ ?>

    <div class="form-group">
	<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Добавить') : Yii::t('app', 'Обновить'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    <?php
	$this->registerJs("
    $('#translit').on('click', function() {
	$('#staticpages-alias').val(urlRusLat($('#staticpages-title').val()));
    });
//Транслитерация кириллицы в URL
    function urlRusLat(str) {
	str = str.toLowerCase(); // все в нижний регистр
	var cyr2latChars = new Array(
		['а', 'a'], ['б', 'b'], ['в', 'v'], ['г', 'g'],
		['д', 'd'], ['е', 'e'], ['ё', 'yo'], ['ж', 'zh'], ['з', 'z'],
		['и', 'i'], ['й', 'y'], ['к', 'k'], ['л', 'l'],
		['м', 'm'], ['н', 'n'], ['о', 'o'], ['п', 'p'], ['р', 'r'],
		['с', 's'], ['т', 't'], ['у', 'u'], ['ф', 'f'],
		['х', 'h'], ['ц', 'c'], ['ч', 'ch'], ['ш', 'sh'], ['щ', 'shch'],
		['ъ', ''], ['ы', 'y'], ['ь', ''], ['э', 'e'], ['ю', 'yu'], ['я', 'ya'],
		['А', 'A'], ['Б', 'B'], ['В', 'V'], ['Г', 'G'],
		['Д', 'D'], ['Е', 'E'], ['Ё', 'YO'], ['Ж', 'ZH'], ['З', 'Z'],
		['И', 'I'], ['Й', 'Y'], ['К', 'K'], ['Л', 'L'],
		['М', 'M'], ['Н', 'N'], ['О', 'O'], ['П', 'P'], ['Р', 'R'],
		['С', 'S'], ['Т', 'T'], ['У', 'U'], ['Ф', 'F'],
		['Х', 'H'], ['Ц', 'C'], ['Ч', 'CH'], ['Ш', 'SH'], ['Щ', 'SHCH'],
		['Ъ', ''], ['Ы', 'Y'],
		['Ь', ''],
		['Э', 'E'],
		['Ю', 'YU'],
		['Я', 'YA'],
		['a', 'a'], ['b', 'b'], ['c', 'c'], ['d', 'd'], ['e', 'e'],
		['f', 'f'], ['g', 'g'], ['h', 'h'], ['i', 'i'], ['j', 'j'],
		['k', 'k'], ['l', 'l'], ['m', 'm'], ['n', 'n'], ['o', 'o'],
		['p', 'p'], ['q', 'q'], ['r', 'r'], ['s', 's'], ['t', 't'],
		['u', 'u'], ['v', 'v'], ['w', 'w'], ['x', 'x'], ['y', 'y'],
		['z', 'z'],
		['A', 'A'], ['B', 'B'], ['C', 'C'], ['D', 'D'], ['E', 'E'],
		['F', 'F'], ['G', 'G'], ['H', 'H'], ['I', 'I'], ['J', 'J'], ['K', 'K'],
		['L', 'L'], ['M', 'M'], ['N', 'N'], ['O', 'O'], ['P', 'P'],
		['Q', 'Q'], ['R', 'R'], ['S', 'S'], ['T', 'T'], ['U', 'U'], ['V', 'V'],
		['W', 'W'], ['X', 'X'], ['Y', 'Y'], ['Z', 'Z'],
		[' ', '-'], ['0', '0'], ['1', '1'], ['2', '2'], ['3', '3'],
		['4', '4'], ['5', '5'], ['6', '6'], ['7', '7'], ['8', '8'], ['9', '9'],
		['-', '-']

		);

	var newStr = new String();

	for (var i = 0; i < str.length; i++) {

	    ch = str.charAt(i);
	    var newCh = '';

	    for (var j = 0; j < cyr2latChars.length; j++) {
		if (ch == cyr2latChars[j][0]) {
		    newCh = cyr2latChars[j][1];

		}
	    }
	    // Если найдено совпадение, то добавляется соответствие, если нет - пустая строка
	    newStr += newCh;

	}
	// Удаляем повторяющие знаки - Именно на них заменяются пробелы.
	// Так же удаляем символы перевода строки, но это наверное уже лишнее
	return newStr.replace(/[_]{2,}/gim, '_').replace(/\\n/gim, '');
    }", yii\web\View::POS_END);
    ?>