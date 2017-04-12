<?php

namespace frontend\controllers;

use Yii;
use frontend\components\Controller;
use frontend\models\StaticPages;
use yii\web\NotFoundHttpException;

class StaticPagesController extends Controller
{

    public function actionIndex($page)
    {
        $model = $this->findModel($page);
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    protected function findModel($alias)
    {
        $model = StaticPages::find()
            ->where([
                'alias' => $alias,
                'published' => StaticPages::PUBLISHED_YES,
                'locale' => Yii::$app->language
            ])
            ->one();
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app','Запрошенная страница не найдена.'));
    }
}