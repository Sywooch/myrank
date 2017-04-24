<?php
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => 'Портфолио',
    'model' => $model,
    'content' => [],
    'view' => "portfolio"
]);
?>