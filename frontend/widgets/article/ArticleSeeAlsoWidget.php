<?php

namespace frontend\widgets\article;

use yii\base\Widget;
use frontend\models\Article;
use yii\data\ActiveDataProvider;

class ArticleSeeAlsoWidget extends Widget {

    public $view = "ArticleSeeAlsoView";
    public $message;
    public $articleCategoryId;

    public function init() {
        parent::init();

        if($this->message === null) {
            $this->message = \Yii::t('app','NO_ARTICLES');
        }

        if($this->articleCategoryId === null) {
            $this->articleCategoryId = 1;
        }
    }

    public function run() {
        parent::run();

        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()
                ->where(['status'=>10,'locale'=>\Yii::$app->language])
                ->andWhere(['article_category_id'=>$this->articleCategoryId])
                //->orderBy('create_time DESC')
                ->orderBy('RAND()') // исправить на другой алгоритм
                ->limit(2),
            'totalCount' => 2,
            'pagination' => [
                'pageSize' => 2,
            ]
        ]);
        return $this->render(
            "articleSeeAlsoView",
            [
                'listDataProvider' => $dataProvider,
                'message' => $this->message
            ]
        );
        //return $this->render("articleLastIssuesView", ['message' => $this->message] );
    }
}
