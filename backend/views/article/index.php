<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use frontend\models\Article;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Новостные статьи');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app','Добавить статью'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_article',
            'title',
            'abridgment',
            'content:ntext',
            'header_title',
            //'header_image','header_image:image',
            [
                'label' => 'Заголовок изображение',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::to($data->header_image),[
                        //'alt'=>'',
                        'style' => 'width:250px;'
                    ]);
                },
            ],
            //'header_image_small',
            [
                'label' => 'Заголовок среднее изображение',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::to($data->header_image_small),[
                        'style' => 'width:150px;'
                    ]);
                },
            ],
            //'header_image_small_square',
            [
                'label' => 'Заголовок уменьшенное изображение',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::to($data->header_image_small_square),[
                        'style' => 'width:50px;'
                    ]);
                },
            ],
            'articleCategoryName', //'article_category_id' =>  'articleCategory.name',
            //'status',
            [
                'attribute' => 'status',
                'filter' => Article::statusDropDownList(),
                'value' => function($model) {
                    return Yii::$app->formatter->asBoolean($model->status);
                },
            ],
            //'views',
            'create_time',
            'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>