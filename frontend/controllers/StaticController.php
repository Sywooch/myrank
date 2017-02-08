<?php
namespace frontend\controllers; //namespace app\controllers;

use frontend\components\Controller;

class StaticController extends Controller
{
    public function actions()
    {
        return [
            'page' => [
                'class' => 'yii\web\ViewAction',
                //'defaultView'=> '',
                //'layout'=>'',
                //'viewParam'=>'',
                //'viewPrefix' => null,
            ]
        ];
    }
}
