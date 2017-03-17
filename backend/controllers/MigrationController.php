<?php

namespace backend\controllers;

use Yii;
use backend\models\Migration;
use backend\models\MigrationSearch;
use frontend\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * MigrationController implements the CRUD actions for Migration model.
 */
class MigrationController extends Controller {

    /**
     * Lists all Migration models.
     * @return mixed
     */
    public function actionIndex() {
	$searchModel = new MigrationSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

	return $this->render('index', [
		    'searchModel' => $searchModel,
		    'dataProvider' => $dataProvider,
	]);
    }

    /**
     * Displays a single Migration model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
	return $this->render('view', [
		    'model' => $this->findModel($id),
	]);
    }

    /**
     * Finds the Migration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Migration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
	if (($model = Migration::findOne($id)) !== null) {
	    return $model;
	} else {
	    throw new NotFoundHttpException('The requested page does not exist.');
	}
    }

}
