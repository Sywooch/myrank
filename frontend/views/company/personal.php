<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;
?>
<div class="container">
    <div id="main">
        <!-- begin b-content -->
        <div class="b-content">
            <!-- begin b-user -->
            <div class="b-user b-block">
                <div class="b-title">
                    Сотрудники
                </div>
            </div>
            <div class="b-company-trusted b-block">
                <?=
                $this->render('personal_items', [
                    'title' => 'Запросы',
                    'model' => $model,
                    'url' => Url::toRoute(['company/changestatus'])
                ]);
                ?>
                <?=
                $this->render('personal_items', [
                    'title' => 'Работают',
                    'model' => $mAct,
                    'url' => Url::toRoute(['company/changestatus'])
                ]);
                ?>
            </div>
            <!-- end b-content -->
        </div>
    </div>
</div>