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
		    return $data->who_from_to == 0 ? "Аноним" : Html::a($data->userFrom->fullName, ['users/view', 'id' => $data->userFrom->id]);
		}
	    ],
	    [
		'label' => 'Кому',
		'content' => function ($data) {
		    return Html::a($data->userTo->fullName, ['users/view', 'id' => $data->userTo->id]);
		}
	    ],
	    [
		'label' => 'Отвечен',
		'content' => function($data) {
		    return "<span class='glyphicon " . (isset($data->answer->id) ? 'glyphicon-ok' : '') . "'></span>";
		}
	    ],
                    [
                        'label' => 'Жалоба',
                        'content' => function ($data) {
                            return "<span class='glyphicon " . (isset($data->claim->id) ? 'glyphicon-exclamation-sign' : '') . "'></span>";
                        }
                    ],
            // 'smile',
            //'parent_id',
            // 'created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
