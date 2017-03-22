<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\models\Marks1;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Marks1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Наименования оценок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить оценку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent_id',
            'access',
            'type',
            'parentName', //['attribute' => 'parentName', 'value' => 'parent.name'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
