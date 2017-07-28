<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\User;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?php // Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
	<?php // Html::a(Yii::t('app', 'Clean Marks'), ['cleanmarks'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
	'dataProvider' => $dataProvider,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
	    
	    [
                'label' => 'Имя',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(
                            $data->fullName,
                            Url::to(['users/view', 'id' => $data->id]),
                            [
                                    'title' => $data->fullName,
                                    'target' =>'_blank'
                            ]
                    );
                },
            ],
            'email',
            [
		'label' => "Тип",
		'content' => function ($data) {
		    return User::$typeUser[$data->type];
		}
	    ],

	    ['class' => 'yii\grid\ActionColumn'],
	],
    ]);
    ?>
<?php Pjax::end(); ?></div>
