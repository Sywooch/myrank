<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestimonialsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Testimonials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonials-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Testimonials'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'text:ntext',
	    [
		'label' => 'От',
		'content' => function ($data) {
		    return $data->userFrom->fullName;
		}
	    ],
	    [
		'label' => 'Кому',
		'content' => function ($data) {
		    return $data->userTo->fullName;
		}
	    ],
	    [
		'label' => 'Ответ',
		'content' => function($data) {
		    return $data->parent_id > 0 ? "Да" : "Нет";
		}
	    ],
            // 'smile',
            // 'parent_id',
            // 'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
