<?php
use frontend\widgets\profile\StatTrusteesWidget;
?>

<?= StatTrusteesWidget::widget(['model' => $model, 'countListView' => 100]) ?>