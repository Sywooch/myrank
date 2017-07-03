<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\Marks;
use yii\helpers\Url;


$this->title = Yii::t('app', 'Marks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Marks'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin() ?>
    <ul>
        <?php foreach ($model as $item) { ?>
            <li>
                <?= $item->name ?>
                <a href="/marks/view?id=<?= $item->id ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a> 
                <a href="/marks/update?id=<?= $item->id ?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
                <a href="/marks/delete?id=<?= $item->id ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </li>
            <ul>
                <li><a href="<?= Url::toRoute(['marks/create', 'parent_id' => $item->id]) ?>">Добавить</a></li>
                <?php foreach ($item->child as $item2) { ?>
                    <li>
                        <?= $item2->name ?>
                        <a href="/marks/view?id=<?= $item2->id ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a> 
                        <a href="/marks/update?id=<?= $item2->id ?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a> 
                        <a href="/marks/delete?id=<?= $item2->id ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </li>
                    <ul>
                        <li><a href="<?= Url::toRoute(['marks/create', 'parent_id' => $item2->id]) ?>">Добавить</a></li>
                        <?php foreach ($item2->child as $item3) { ?>
                            <li>
                                <?= $item3->name ?>
                                <a href="/marks/view?id=<?= $item3->id ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a> 
                                <a href="/marks/update?id=<?= $item3->id ?>" title="Редактировать" aria-label="Редактировать" data-pjax="0">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a> 
                                <a href="/marks/delete?id=<?= $item3->id ?>" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </ul>
        <?php } ?>
    </ul>
    <?php Pjax::end() ?>
</div>  
