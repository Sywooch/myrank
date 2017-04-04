<?php
use yii\helpers\Url;
?>
<div class="b-search__content">
    <?php foreach ($model as $item) { ?>
        <!-- begin b-user -->
        <div class="b-user">
    	<div class="b-user__data">
    	    <div class="b-user__data__left">
    		<div class="b-user__data__image">
		    <img src="<?= $item->userImage ?>" alt="">
    		    <div class="b-user__data__image__info">
    			<ul>
			    <?php foreach ($item->userProfession as $item2) { ?>
    			    <li><?= $item2->title ?></li>
			    <?php } ?>
    			</ul>
    			<!-- div class="b-user__data__image__info__likes">
    			    10
    			</div -->
    			<!-- div class="b-user__data__image__info__messages">
    			    12
    			</div -->
    		    </div>
    		</div>
    	    </div>
    	    <div class="b-user__data__right">
    		<div class="b-user__data__header">
    		    <div class="b-user__data__name">
			<div><a href="<?= Url::toRoute(['users/profile', 'id' => $item->id]) ?>"><?= $item->fullName ?></a></div>
    			<!-- span class="b-user__data__name__edit"></span -->
    		    </div>
    		    <div class="b-user__data__info">
    			<a class="b-user__data__info__add-trusted" href="#">
    			    В доверенные
    			</a>
    			<div class="b-user__data__info__rating">
    			    <span><?= $item->rating ?></span>
    			    Рейтинг
    			</div>
    		    </div>
    		</div>
    		<div class="b-user__data__content">
    		    <div class="b-user__data__content__item">
    			<div class="b-user__data__content__item__adress">
				<?= $item->position ?>
    			</div>
    		    </div>
			<?php if ($item->company_name != "") { ?>
			    <div class="b-user__data__content__item">
				<div class="b-user__data__content__item__work">
				    <?= $item->company_name ?>
				</div>
			    </div>
			<?php } ?>
    		</div>
    		<div class="b-tags">
		    <?php foreach ($item->userProfession as $item2) { ?>
    		    <span><?= $item2->title ?></span>
		    <?php } ?>
    		</div>
    	    </div>
    	</div>
        </div>
    <?php } ?>
</div>

<?php if(count($mSearch) > 10) { ?>
<div class="b-pagination">
    <ul>
	<li class="b-pagination__prev"><a href="#"></a></li>
	<li class="active"><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li class="b-pagination__next"><a href="#"></a></li>
    </ul>
</div>
<?php } ?>