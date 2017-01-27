<?php
namespace frontend\controllers; //namespace app\controllers;

use yii\web\Controller;

class StaticController extends Controller
{
    public function actions()
    {
        return [
            'page' => [
                'class' => 'yii\web\ViewAction',
            ]
        ];
    }
}
