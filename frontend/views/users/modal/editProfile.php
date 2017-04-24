<?php
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => \Yii::t('app','PORTFOLIO'),
    'model' => $model,
    'content' => [],
    'view' => "portfolio"
]);
?>