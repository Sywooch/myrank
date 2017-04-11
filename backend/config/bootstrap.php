<?php
//Yii::setAlias('@back-images',dirname(dirname(__DIR__)).'/backend/web/images');
//Yii::setAlias('@front-images',dirname(dirname(__DIR__)).'/frontend/web/images');
//absolute path str_replace('\\','/',\yii::getAlias('@back-images'))

//Yii::setAlias('@site', 'http://front.myrank');
Yii::setAlias('@site', 'http://myrankf.site4ever.com');
Yii::setAlias('@urlToImages','@site/images'); //$urlToImages // url
Yii::setAlias('@pathToImages',dirname(dirname(__DIR__)).'/frontend/web/images'); //$pathToImages // path