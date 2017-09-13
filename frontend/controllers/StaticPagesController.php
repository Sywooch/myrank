<?php

namespace frontend\controllers;

use Yii;
use frontend\components\Controller;
use frontend\models\StaticPages;
use yii\web\NotFoundHttpException;

class StaticPagesController extends Controller {
    
    public function actionIndex($page)
    {
        $model = $this->findModel($page);
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    
    public function actionAboutus () {
        return $this->render('index', ['model' => $this->findModel('aboutus')]);
    }    
    
    public function actionBalance () {
        return $this->render('index', ['model' => $this->findModel('balance')]);
    }
    
    public function actionHelp () {
        return $this->render('index', ['model' => $this->findModel('help')]);
    }
    
    public function actionContacts () {
        return $this->render('index', ['model' => $this->findModel('contacts')]);
    }
    
    public function actionLegalinfo () {
        return $this->render('index', ['model' => $this->findModel('legalinfo')]);
    }

    protected function findModel($alias) {
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
        throw new NotFoundHttpException(Yii::t('app', 'REQUESTED_PAGE_WAS_NOT_FOUND'));
    }

}
