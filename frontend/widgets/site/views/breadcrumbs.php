<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */
use yii\widgets\Breadcrumbs;
?>

<!-- start b-breadcrumbs -->
<div class="container"> 
    <div class="b-breadcrumbs">
        <?php
        $out = [];
        foreach ($links as $key => $item) {
            $item['class'] = 'b-breadcrumbs__link';
            $out[] = $item;
        }
        
        echo yii\widgets\Breadcrumbs::widget([
            'options' => ['class' => "b-breadcrumbs__container"],
            'itemTemplate' => "<li class='b-breadcrumbs__item'>{link}</li>\n", // template for all links
            'homeLink' => [
                'label' => 'Главная',
                'url' => ['site/index'],
                'template' => "<li class='b-breadcrumbs__item'>{link}</li>\n",
                'class' => 'b-breadcrumbs__link'
            ],
            'links' => $out,
        ]);
        ?>
    </div>
</div>


