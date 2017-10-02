<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */

if (empty($model->title_browser)) {
    $this->title = $model->title;
} else {
    $this->title = $model->title_browser;
}
if (!empty($model->meta_description)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_description), 'name' => 'description']);
}
if (!empty($model->meta_keywords)) {
    $this->registerMetaTag(['content' => Html::encode($model->meta_keywords), 'name' => 'keywords']);
}

$this->params['breadcrumbs'] = [
    ['label' => $this->title, 'url' => [$model->alias]],
];
?>
<div class="container">

    <p></p>
    <h2><?= Html::encode($model->title); ?></h2>

    <?= $model->content; ?>

    <?= $this->render('_contact-form', ['model' => $formModel]); ?>
</div>
<?php
echo yii2mod\google\maps\markers\GoogleMaps::widget([
    'userLocations' => [
        [
            'location' => [
                'address' => 'Office 5, Neepsend Triangle Business Centre, 1 Burton Rd, Sheffield S3 8BW, United Kingdom',
                'city' => 'Sheffield',
                'country' => 'United Kingdom'
            ],
            'htmlContent' => '<h4>' . \Yii::t('app', 'ADDRESS_INFO') . '</h4>',
        ],
    ],
]);
?>
