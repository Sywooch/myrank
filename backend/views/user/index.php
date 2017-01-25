<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\User;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
	'dataProvider' => $dataProvider,
	'columns' => [
	    ['class' => 'yii\grid\SerialColumn'],
	    
	    [
		'label' => "Имя",
		'content' => function ($data) {
		    return $data->last_name . " " . $data->first_name;
		}
	    ],
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
