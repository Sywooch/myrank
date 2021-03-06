<?php

namespace frontend\widgets\article;

use yii\base\Widget; // \yii\bootstrap\Widget
use frontend\models\Article;
use yii\data\ActiveDataProvider;

class ArticleLastIssuesWidget extends Widget {

    public $view = "ArticleLastIssuesView";
    public $message;

    public function init() {
        parent::init();
        if($this->message === null) {
            $this->message = \Yii::t('app','NO_ARTICLES');
        }
    }

    public function run() {
        parent::run();

        $dataProviderArticleLastIssues = new ActiveDataProvider([
            'query' => Article::find()
                ->where(['status'=>10,'locale'=>\Yii::$app->language])
                ->orderBy('create_time DESC')->limit(3),
            'totalCount' => 3,
            'pagination' => [
                'pageSize' => 3,
            ]
        ]);
        return $this->render(
            "articleLastIssuesView",
            [
                'listDataProviderArticleLastIssues' => $dataProviderArticleLastIssues,
                'message' => $this->message
            ]
        );
    }
}
