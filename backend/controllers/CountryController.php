<?php

namespace backend\controllers;


use Yii;
use frontend\models\Country;
use backend\models\CountrySearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use frontend\models\GeoCountry;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'delete', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new CountrySearch();
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
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
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
            //echo "<pre>"; var_dump($model); echo "</pre>";
            return $this->redirect(['index']);
        } else {
            $mGeoC = GeoCountry::findOne(['country_id' => $id]);
            if (isset($mGeoC->id)) {
                $model->countryCode = $mGeoC->code;
            }
            $geoC = [];
            $presGeo = GeoCountry::find()->where(['country_id' => $id])->all();
            foreach ($presGeo as $item) {
                $geoC[$item->lang] = [
                    'name' => $item->name,
                    'code' => $item->code,
                ];
            }

            return $this->render('update', [
                    'model' => $model,
                    'geoC' => $geoC,
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
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(((string) \Yii::t('app', 'REQUESTED_PAGE_WAS_NOT_FOUND')));
        }
    }
}
