<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\models\Testimonials1;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Testimonials1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text:ntext',
            'user_from',
            'userFromFullName',
            'user_to',
            'userToFullName',
            'smile',
            'parent_id',
            'parentText',//['attribute' => 'parentName', 'value' => 'parent.name'],
            'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
