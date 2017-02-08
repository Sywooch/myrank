<?php foreach ($fields as $key => $item) { 
    if($item != "") { ?>
<div class="b-user__info__list__col">
    <div class="b-user__info__list__item">
	<div class="b-user__info__list__item__content">
	    <div class="b-user__info__list__item__title"><?= $key ?></div>
	    <div class="b-user__info__list__item__text"><?= $item ?></div>
	</div>
    </div>
</div>
<?php }} ?>