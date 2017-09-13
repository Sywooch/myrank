<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserTrusteesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Доверенные пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-trustees-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Добавить доверенных пользователей', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                //'attribute' => 'from_id',
                'label' => 'От кого',
                'format' => 'raw',
                'content' => function ($data) {
                    $typeUser = frontend\models\User::$typeUser;
                    return $data->userFrom->fullName . " (" .$typeUser[$data->type_from] . ")"; // . " -> " . $data->user->fullName;
                }
            ],
            [
                //'attribute' => 'from_id',
                'label' => 'Кому',
                'format' => 'raw',
                'content' => function ($data) {
                    $typeUser = frontend\models\User::$typeUser;
                    return $data->user->fullName . " (" .$typeUser[$data->type_to] . ")"; // . " -> " . $data->user->fullName;
                }
            ],
            [
                'attribute' => 'status',
                'label' => 'Подтвержден',
                'format' => 'raw',
                'content' => function ($data) {
                    $arr = ['Нет', 'Да'];
                    return $arr[$data->status];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
