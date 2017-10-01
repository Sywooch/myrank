<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\Marks;
use backend\models\User;

$this->title = Yii::t('app', 'Marks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Marks'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'text',
                'content' => function ($data) {
                    $list = Marks::getList();
                    $parentLink = Html::a($list[$data->parent_id], ['update', 'id' => $data->parent_id]);
                    return $data->parent_id > 0 ? $parentLink . " - " . $data->name : $data->name . " (".$data->id.")";
                }
            ],
            [
                'attribute' => 'name_en',
                'label' => 'EN',
                'format' => 'text',
                'content' => function ($data) {
                    $class = $data->name_en == "" ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-ok';
                    return "<span class='$class'></span>";
                }
            ],
            [
                'attribute' => 'name_ua',
                'label' => 'UA',
                'format' => 'text',
                'content' => function ($data) {
                    $class = $data->name_ua == "" ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-ok';
                    return "<span class='$class'></span>";
                }
            ],
            [
                'attribute' => 'parent_id',
                //'label' => "Родитель",
                'format' => 'text',
                'content' => function ($data) {
                    $list = Marks::getList();
                    return isset($list[$data->parent_id]) ? $list[$data->parent_id] . "(".$data->parent_id.")" : "";
                },
                'filter' => Marks::getList()
            ], /*
              [
              'attribute' => 'access',
              'format' => 'text',
              'content' => function ($data) {
              $list2 = Marks::marksAccess();
              return $list2[$data->access];
              },
              'filter' => Marks::marksAccess(),
              ], */
            [
                'attribute' => 'type',
                'format' => 'text',
                'content' => function ($data) {
                    return User::$typeUser[$data->type];
                },
                'filter' => User::$typeUser
            ],
            [
                'attribute' => 'required',
                'format' => 'text',
                'content' => function ($data) {
                    return $data->required ? "Дa" : "Нет";
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <style type="text/css">
        .glyphicon-remove {color:red;}
        .glyphicon-ok {color:greenyellow;}
    </style>
    <?php Pjax::end(); ?></div>
