<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;
?>
<div class="b-modal">
    <div class="b-modal__header">
        Добавление сотрудника в структуру
        <?php Yii::t("app", "CREATE_STRUCT") ?>
    </div>
    <div class="b-modal__content">
        <div class="row">
            <div class="col-md-12" id="listParts">
                <?php foreach ($model as $item) { ?>
                    <div class="b-collapse__item">
                        <a href="#addUserToStruct<?= $item->id ?>" class="b-collapse__nav collapsed" data-toggle="collapse" aria-controls="addUserToStruct<?= $item->id ?>">
                            <span class="b-collapse__name"><?= $item->name ?></span>
                        </a>
                        <div class="b-collapse__tab collapse" id="addUserToStruct<?= $item->id ?>" data-id="<?= $item->id ?>">
                            <div class="b-collapse__inner">
                                <div class="b-tabs">
                                    <div class="b-tabs__nav clearfix">
                                        <?php foreach ($item->children as $child) { ?>
                                            <div class="col-lg-4 col-md-6" data-id="<?= $child->id ?>">
                                                <a href="#" class ="b-tabs__link subPartUsers">
                                                    <?= $child->name ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
$addUserToStructUrl = Url::toRoute(['company/addusertostructsave']);
?>
<script type="text/javascript">
    $('body').on('click', '.subPartUsers', function () {
        var structId = $(this).parent().attr('data-id');
        $.get('<?= $addUserToStructUrl ?>', {structId:structId, userId: <?= $userId ?>}, function (out) {
            location.reload(true);
        }, 'json');
    });
</script>
