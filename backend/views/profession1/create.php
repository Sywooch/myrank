<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Profession1 */

$this->title = 'Добавить направление профессии';
$this->params['breadcrumbs'][] = ['label' => 'Направления профессий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profession1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
