<?php

use yii\helpers\Url;
use yii\helpers\Html;

$viewButt = (Yii::$app->user->id !== NULL) && (frontend\models\UserConstant::getProfile()->objId == $model->type_id);
?>
<div class="b-modal__header">
    <?= $model->title ?>
    <?= $viewButt ? Html::button('Удалить', ['class' => 'button-small removePortfolio']) : NULL; ?>
</div>
<div class="b-modal__content">
    <div class="row">
        <?php
        $url = "/" . implode(DIRECTORY_SEPARATOR, ['files', 'company', $model->type_id, $model->name]);
        echo Html::img($url);
        ?>
    </div>
    <div class="row">
        <?= $model->description ?>
    </div>
</div>
<?php $urlRemovePortfolio = Url::toRoute(['company/remove-portfolio', 'id' => $model->id]); ?>
<script type="text/javascript">
    $('body').on('click', '.removePortfolio', function () {
        $.get('<?= $urlRemovePortfolio ?>', function (out) {
            if(out.code == 1) {
                location.reload(true);
            }
        }, 'json');
    });
</script>