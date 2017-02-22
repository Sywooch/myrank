<?php

namespace frontend\widgets\article;

use yii\base\Widget;
use frontend\models\Article;
use yii\data\ActiveDataProvider;

class ArticleSeeAlsoWidget extends Widget {

    public $view = "ArticleSeeAlsoView";
    public $message;

    public function init() {
        parent::init();
        if($this->message === null) {
            $this->message = 'empty message';
        }
    }

    public function run() {
        parent::run();

        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->where(['status'=>10])->/*orderBy('create_time DESC')->*/limit(2),
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
