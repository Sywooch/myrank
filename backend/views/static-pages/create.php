<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */

$this->title = Yii::t('app', 'Добавить статические страницы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статические страницы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-pages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
