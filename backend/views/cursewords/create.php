<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CurseWords */

$this->title = Yii::t('app', 'Create Curse Words');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Curse Words'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curse-words-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
