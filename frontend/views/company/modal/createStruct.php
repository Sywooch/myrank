<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;
?>
<div class="b-modal">
    <div class="b-modal__header">
        <?= Yii::t("app", "CREATE_STRUCT") ?>
    </div>
    <div class="b-modal__content" id="configureMarks">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" id="namePart" placeholder="Название отдела">
                    <span class="input-group-btn">
                        <button class="btn button-small" id="addPart" type="button">Добавить отдел</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="listParts">
                <?php foreach ($model as $item) { ?>
                    <div class="b-collapse__item">
                        <a href="#coll<?= $item->id ?>" class="b-collapse__nav collapsed" data-toggle="collapse" aria-controls="coll<?= $item->id ?>">
                            <span class="b-collapse__name"><?= $item->name ?></span>
                        </a>
                        <div class="b-collapse__tab collapse" id="coll<?= $item->id ?>" data-id="<?= $item->id ?>">
                            <div class="b-collapse__inner">
                                <div class="b-tabs">
                                    <div class="b-tabs__nav clearfix">
                                        <div class="col-md-12" style="margin-bottom:20px;">
                                            <div class="input-group">
                                                <input type="text" class="form-control nameChildrenPart" placeholder="Название отдела">
                                                <span class="input-group-btn">
                                                    <button class="btn button-small addChildrenPart" type="button">Добавить</button>
                                                </span>
                                                <span class="input-group-btn">
                                                    <button class="btn button-small removePart" type="button">Удалить</button>
                                                </span>
                                            </div>
                                        </div>
                                        <?php foreach ($item->children as $child) { ?>
                                            <div class = "col-lg-4 col-md-6">
                                                <div class ="b-tabs__link">
                                                    <?= $child->name ?>
                                                </div>
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
$addStructUrl = Url::toRoute(['company/add-struct-part']);
$addChildStructUrl = Url::toRoute(['company/add-child-struct-part']);
$removePartUrl = Url::toRoute(['company/remove-part']);
?>
<script type="text/javascript">
    $('body').on('click', '#addPart', function () {
        name = $('#namePart').val();
        if(name != "") {
            $.get('<?= $addStructUrl ?>', {name: name}, function (out) {
                if (out.code == 1) {
                    $('#listParts').append(out.data);
                    $('#namePart').val("");
                }
            }, 'json');
        }
    });

    $('body').on('click', '.addChildrenPart', function () {
        var block = $(this).closest('.b-collapse__tab');
        var parent = block.attr('data-id');
        var name = block.find('.nameChildrenPart').val();
        if(name != "") {
            $.get('<?= $addChildStructUrl ?>', {name: name, parent: parent}, function (out) {
                if (out.code == 1) {
                    block.find('.b-tabs__nav').append(out.data);
                    block.find('.nameChildrenPart').val("");
                }
            }, 'json');
        }
    });

    $('body').on('click', '.removePart', function () {
        var block = $(this).closest('.b-collapse__tab');
        var id = block.attr('data-id');
        $.get('<?= $removePartUrl ?>', {id: id}, function (out) {
            if (out.code == 1) {
                block.closest('.b-collapse__item').hide('slow', function () {
                    block.closest('.b-collapse__item').remove();
                });
            }
        }, 'json');
    });
</script>
