<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserMarksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оценки пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-marks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить оценки пользователей', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_to',
            'fullNameTo',
            'user_from',
            'fullNameFrom',
            'description:ntext',
            'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
