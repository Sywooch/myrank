<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Users1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'id',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                            $data->id,
                            Url::to(['site/profile', 'id' => $data->id]),
                            [
                                    'title' => 'Смелей вперед!',
                                    'target' =>'_blank'
                            ]
                    );
                },
            ],
            'account_id',
            'company_id',
            'company_name',
            'company_post',
            'profileviews',
            'type',
            'image',
            'first_name',
            'last_name',
            'email:email',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'about',
            'last_login',
            'rating',
            'birthdate',
            'gender',
            //'city_id',
            'cityName',
            'phone',
            'site',
            //'mark:ntext',
            //'marks_config:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
