<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileViewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Просмотры профиля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-views-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать просмотры профиля', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lastweek',
            'lastmonth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
