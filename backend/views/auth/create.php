<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Auth1 */

$this->title = 'Create Auth1';
$this->params['breadcrumbs'][] = ['label' => 'Auth1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
