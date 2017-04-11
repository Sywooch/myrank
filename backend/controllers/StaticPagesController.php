<?php

namespace backend\controllers;

use Yii;
use frontend\models\StaticPages;
use backend\models\StaticPagesSearch;
use frontend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use vova07\imperavi\Widget;
use vova07\imperavi\actions\GetAction as GetAction;
use vova07\imperavi\actions\UploadAction as UploadAction;

/**
 * StaticPagesController implements the CRUD actions for StaticPages model.
 */
class StaticPagesController extends Controller
{
    /*public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

            // добавить изображение которое полностью отгружено
            'images-get'   => [
                'class' => GetAction::className(),
                'url'   => Yii::getAlias('@urlToImages'), //Url::to(['/images/upload']),
                'path'  => Yii::getAlias('@pathToImages'),//str_replace('\\','/',\yii::getAlias('@front-images')),//'@front-upload'
                'type'  => GetAction::TYPE_IMAGES,
            ],

            // отгрузить картинку
            'image-upload' => [
                'class' => UploadAction::className(),
                'url'   => Yii::getAlias('@urlToImages'),
                'path'  => Yii::getAlias('@pathToImages'),
            ],

            // добавить файл который полностью отгружен
            'files-get'    => [
                'class' => GetAction::className(),
                'url'   => Yii::getAlias('@urlToImages'),
                'path'  => Yii::getAlias('@pathToImages'),
                'type'  => GetAction::TYPE_FILES
            ],

            // отгрузить файл
            'file-upload'  => [
                'class' => UploadAction::className(),
                'url'   => Yii::getAlias('@urlToImages'),
                'path'  => Yii::getAlias('@pathToImages'),
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new StaticPagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new StaticPages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = StaticPages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app','Запрошенная страница не существует.'));
        }
    }
}
