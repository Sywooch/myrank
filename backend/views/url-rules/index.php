<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'SEO Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Добавить правило', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'id',
            'contr_act',
            'rules',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
