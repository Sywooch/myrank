<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Marks1 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Наименования оценок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'parent_id',
            'access',
            'type',
        ],
    ]) ?>

</div>
