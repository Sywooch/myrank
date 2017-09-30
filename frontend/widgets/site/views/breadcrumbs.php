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
            //$out['class'] = 'b-breadcrumbs__link';
            $out[$key] = $item;
            $out[$key]['class'] = "b-breadcrumbs__link";
        }
        
        echo yii\widgets\Breadcrumbs::widget([
            'options' => ['class' => "b-breadcrumbs__container"],
            'itemTemplate' => "<li class='b-breadcrumbs__item'>{link}</li>\n", // template for all links
            'homeLink' => [
                'label' => Yii::t('app', 'MAIN_PAGE'),
                'url' => ['site/index'],
                'template' => "<li class='b-breadcrumbs__item'>{link}</li>\n",
                'class' => 'b-breadcrumbs__link'
            ],
            'itemTemplate' => "<li class='b-breadcrumbs__item'>{link}</li>\n",
            'links' => $out,
        ]);
        ?>
    </div>
</div>


