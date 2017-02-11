<?php

//namespace app\controllers;
namespace frontend\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use app\models\Article;
use app\models\ArticleSearch;
use frontend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public $modelClass = 'app\models\Article';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $paginationPageSize = 6;
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->where(['status'=>10])->orderBy('create_time DESC'),
            'pagination' => [
                'pageSize' => $paginationPageSize,
            ],
        ]);

        $query_result_counter = $dataProvider->getTotalCount();
        //$posts =  $dataProvider->getModels();


        //$this->view->title = 'Articles';
        return $this->render(
            'index', [
                'listDataProvider' => $dataProvider,
                'articlesCount' => $query_result_counter,
                'paginationPageSize' => $paginationPageSize,

            ]);

        /*$searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/

//        $model = new $this->modelClass;
//        $query = $model::find();
//        $dataProvider = new ActiveDataProvider(['query' => $query]);
//        $dataProvider->pagination = false; // отключаем пагинацию
        //$query->andWhere(['user_id' => \Yii::$app->user->identity->id]);
//        $query_result_counter = $dataProvider->getTotalCount();
        /*$elements_to_index = array('id_article','title','abridgment',
                    //'content',
                    'header_title',
                    //'header_image',
                    'header_image_small','article_category_id',
                    //'status','views','create_time','update_time'
                );*/
//        if ($query_result_counter == 0)
//            return 'false';
//        else {
            //echo 'Количество статей: '.$query_result_counter.'<br>';
//            $posts =  $dataProvider->getModels();
            /*foreach($posts as $key=>&$post) { //  foreach($posts as &$post) {
                if(!in_array($key,$elements_to_index))
                {
                    unset($posts[$key]);
                }
            }
            unset($post); // разорвать ссылку на последний элемент
            */
//            return $this->render('index', [
//                    'model' => $model,//'model' => $this->findModel(1)
//                    //'dataProvider' => $dataProvider,
//                    'posts' => $posts,
//                    'articles_count' => $query_result_counter,
//                    //'model' => $this->findModel(1)
 //               ]
 //           );
 //       }
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_article]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_article]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
