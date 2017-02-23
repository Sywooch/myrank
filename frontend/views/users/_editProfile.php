<?php
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => 'Портфолио',
    'model' => new frontend\models\Images(),
    'content' => [],
    'view' => "portfolio"
]);
?>