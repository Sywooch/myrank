<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Url;

$mComp = \frontend\models\UserConstant::getProfile();

$this->title = Yii::t('app', 'PERSONALS');

$this->params['breadcrumbs'] = [
    [
        'label' => \Yii::t('app', 'COMPANY_PROFILE') . " " . $mComp->name,
        'url' => ['company/profile', 'id' => $mComp->id]
    ],
    ['label' => $this->title, 'url' => ['company/personal', 'id' => $mComp->id]]
];
?>
<div class="container">
    <div id="main">
        <!-- begin b-content -->
        <div class="b-content">
            <!-- begin b-user -->
            <div class="b-user b-block">
                <div class="b-title"><?= $this->title ?></div>
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