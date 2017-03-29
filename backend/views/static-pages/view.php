<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\StaticPages;

/* @var $this yii\web\View */
/* @var $model frontend\models\StaticPages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статические страницы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-pages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить эту позицию?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'alias',
            [
                'attribute' => 'published',
                'filter' => StaticPages::publishedDropDownList(),
                'value' => function($model) {
                    return Yii::$app->formatter->asBoolean($model->published);
                },
            ],

            'content:ntext',
            'title_browser',
            'meta_keywords',
            'meta_description',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
