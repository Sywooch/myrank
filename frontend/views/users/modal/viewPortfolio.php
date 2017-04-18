<?php
use yii\helpers\Url;
?>
<div class="b-modal__header">
    <?= $model->title ?>
</div>
<div class="b-modal__content">
    <div class="row">
	<img src="<?= Url::toRoute(['media/viewimage', 'id' => $model->id]) ?>" />
    </div>
    <div class="row">
	<?= $model->description ?>
    </div>
</div>