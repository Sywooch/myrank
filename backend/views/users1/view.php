<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user1-view">

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
            //'account_id',
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
            'auth_key',
            'password_hash',
            'password_reset_token',
            'about',
            'last_login',
            'rating',
            'birthdate',
            'gender',
            'city_id',
            'cityName',
            'phone',
            'site',
            'mark:ntext',
            'marks_config:ntext',
        ],
    ]) ?>

</div>
