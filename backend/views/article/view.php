<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Article;

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Обновить'), ['update', 'id' => $model->id_article], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app','Удалить'), ['delete', 'id' => $model->id_article], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_article',
            'title',
            'abridgment',
            'content:ntext',
            'header_title',
            'header_image',
            'articleCategoryName',//'article_category_id',
            //'status',
            [
                'attribute' => 'status',
                'filter' => Article::statusDropDownList(),
                'value' => function($model) {
                    return Yii::$app->formatter->asBoolean($model->status);
                },
            ],
            'locale',
            'views',
            'create_time',
            'update_time',
            'header_image',
            'header_image_small',
            'header_image_small_square',
        ],
    ]) ?>

</div>

<div class="b-article__header__image"><p><?php echo $model->getAttributeLabel('header_image'); ?></p>
    <img src="<?= Html::encode($model->header_image) ?>" alt="">
</div>
<br>
<div class="b-article__header__image"><p><?php echo $model->getAttributeLabel('header_image_small'); ?></p>
    <img src="<?= Html::encode($model->header_image_small) ?>" alt="">
</div>
<br>
<div class="b-article__header__image"><p><?php echo $model->getAttributeLabel('header_image_small_square'); ?></p>
    <img src="<?= Html::encode($model->header_image_small_square) ?>" alt="">
</div>
