<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Marks1 */

$this->title = 'Создать самооценки';
$this->params['breadcrumbs'][] = ['label' => 'Самооценки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
