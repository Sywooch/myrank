<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\StaticPages;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaticPagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Статические страницы');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить статические страницы'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'attribute'=>'content', //'attribute'=>'content:ntext',
                'format'=>'ntext',
                'contentOptions' => ['class' => 'text-wrap'],//'contentOptions' => ['style' => ['max-width' => '200px;', 'height' => '100px']],
                'value' => function($model, $key, $index, $column) {
                    return mb_substr($model->content,0,200);
                }
            ],
            'locale',
            'title_browser',
            'meta_keywords',
            'meta_description',
            'create_time',
            'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>
</div>
