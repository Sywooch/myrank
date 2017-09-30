<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;

$viewMarks = isset($model[0]) && count($model[0]) > 0;
?>
<div class="b-modal">
    <div class="b-modal__header">
        <?= \Yii::t('app', 'CUSTOM_CONFIGURE_THE_DISPLAY_OF_MARKS'); ?>
    </div>
    <div class="b-modal__content" id="configureMarks">
        <?php if ($viewMarks) { ?>
        <div class="row">
            <div class="col-md-12">
                <?= Yii::t('app', 'SELECT_UP_TO_TEN_CRITERIA') ?>
            </div>
        </div>
        <div class="row">
            <?php
                foreach ($model[0] as $key => $item) {
                    if (isset($model[$key])) {
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse<?= $key ?>"><?= $item ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $key ?>" class="panel-collapse collapse">
                                        <?php
                                        $i = 1;
                                        foreach ($model[$key] as $key2 => $item2) {
                                            ?>
                                            <div class="<?= $i % 2 == 0 ? 'panel-footer' : 'panel-body' ?>">
                                                <span 
                                                    class="glyphicon addCritMarks glyphicon-<?= isset($mUMC[$key2]) ? "minus" : "plus" ?>" 
                                                    data-id="<?= $key2 ?>"
                                                    ></span>
                                                <?= $item2 ?>
                                            </div>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php
                    }
                }
            ?>
        </div>
        <?php } else {
                echo "<div class='row'>Нет доступных критериев для добавления</div>";
            } ?>
        <div class="b-modal__content__buttons">
            <?php if($viewMarks) { ?>
            <div class="b-modal__content__buttons__item">
                <a id="critMarks_save" class="button-small" href="#"><?= \Yii::t('app', 'SAVE'); ?></a>
            </div>
            <?php } ?>
            <div class="b-modal__content__buttons__item">
                <span><a id="configMarks_cancel" class="cancel" href="#"><?= \Yii::t('app', 'CANCEL'); ?></a></span>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .addCritMarks {font-size: 18px;}
    .addCritMarks.glyphicon-minus {color: red;}
    .addCritMarks.glyphicon-plus {color:#55de19}
</style>
<script type="text/javascript">
    $(".addCritMarks").on('click', function () {
        if ($(this).hasClass('glyphicon-plus')) {
            $(this).addClass('glyphicon-minus').removeClass('glyphicon-plus');
        } else {
            $(this).addClass('glyphicon-plus').removeClass('glyphicon-minus');
        }
    });

    $("#critMarks_save").on('click', function () {
        var obj = {};
        obj['_csrf-frontend'] = $('[name="csrf-token"]').attr('content');
        var url = '<?= Url::toRoute(['users/custom-config-marks-save', 'id' => $id]); ?>';
        $(this).closest("#configureMarks").find('.addCritMarks').each(function (i, val) {
            if ($(val).hasClass('glyphicon-minus')) {
                id = $(val).attr('data-id');
                obj['UserMarksCustom[marks][' + i + ']'] = id;
            }
        });
        $.ajax({
            url: url,
            dataType: 'json',
            method: 'POST',
            success: function (out) {
                if (out.code == 1) {
                    location.reload(true);
                }
            },
            data: obj,
        });
        console.log(obj);
        return false;
    });
</script>