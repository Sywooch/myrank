<?php foreach ($fields as $key => $item) { 
    $name = isset($fieldsName[$item]) ? $fieldsName[$item] : $item;
    $value = $model->$item == "" ? Yii::t('app', 'NO_DATA') : $model->$item;
    ?>
<div class="b-user__info__list__col">
    <div class="b-user__info__list__item">
	<div class="b-user__info__list__item__content">
	    <div class="b-user__info__list__item__title"><?= $name ?></div>
	    <div class="b-user__info__list__item__text"><?= $value ?></div>
	</div>
    </div>
</div>
<?php } ?>