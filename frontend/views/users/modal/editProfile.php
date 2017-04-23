<?php
use frontend\widgets\user\ModalWidget;

echo ModalWidget::widget([
    'title' => \Yii::t('app','PORTFOLIO'),
    'model' => new frontend\models\Images(),
    'content' => [],
    'view' => "portfolio"
]);
?>