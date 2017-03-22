<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Marks1 */

$this->title = 'Создать оценку';
$this->params['breadcrumbs'][] = ['label' => 'Наименования оценок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
