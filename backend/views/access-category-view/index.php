<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AccessCategoryViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Доступ к категориям просмотра';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-category-view-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить доступ к категориям просмотра', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'category_id',
            'value',
            //'categoryName',
            'userFullName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
