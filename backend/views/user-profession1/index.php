<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserProfession1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Профессии пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profession1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить профессии пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'userFullName',
            'profession_id',
            'profession1Title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
