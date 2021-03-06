<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserMarkRatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Общий рейтинг оценок пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-mark-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить общий рейтинг оценок пользователей', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_from',
            'fullNameFrom',
            'user_to',
            'fullNameTo',
            'mark_id',
            'marks1Name',
            'mark_val',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
