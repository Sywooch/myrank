<?php

namespace backend\controllers;

use Yii;
use frontend\models\UserTrustees;
use backend\models\UserTrusteesSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTrustees1Controller implements the CRUD actions for UserTrustees1 model.
 */
class UserTrusteesController extends Controller {

    /**
     * @inheritdoc
     */
    /* public function behaviors()
      {
      return [
      'verbs' => [
      'class' => VerbFilter::className(),
      'actions' => [
      'delete' => ['POST'],
      ],
      ],
      ];
      } */

    public function actionIndex() {
	$searchModel = new UserTrusteesSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	return $this->render('index', [
		    'searchModel' => $searchModel,
		    'dataProvider' => $dataProvider,
	]);
    }

    public function actionView($id) {
	return $this->render('view', [
		    'model' => $this->findModel($id),
	]);
    }

    public function actionCreate() {
	$model = new UserTrustees();

	if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    return $this->redirect(['view', 'id' => $model->id]);
	} else {
	    return $this->render('create', [
			'model' => $model,
	    ]);
	}
    }

    public function actionUpdate($id) {
	$model = $this->findModel($id);

	if ($model->load(Yii::$app->request->post()) && $model->save()) {
	    return $this->redirect(['view', 'id' => $model->id]);
	} else {
	    return $this->render('update', [
			'model' => $model,
	    ]);
	}
    }

    public function actionDelete($id) {
	$this->findModel($id)->delete();

	return $this->redirect(['index']);
    }

    protected function findModel($id) {
	if (($model = UserTrustees::findOne($id)) !== null) {
	    return $model;
	} else {
	    throw new NotFoundHttpException(((string) \Yii::t('app','REQUESTED_PAGE_WAS_NOT_FOUND') ));
	}
    }

}
