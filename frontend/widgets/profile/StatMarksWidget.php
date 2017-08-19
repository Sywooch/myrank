<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\profile;

use yii\base\Widget;
use frontend\widgets\user\MarksWidget;

class StatMarksWidget extends MarksWidget {
    
    public $model;
    public $view = "statMarks";
    public $cols = 2;
    public $countListView = 8;

    public function init() {
        $this->list = $this->model->userMarksTo;
    }

    public function run() {
        $title = $this->model->isCompany ? "Оценки компании" : "Мои оценки";
        return $this->render($this->view, [
                    'title' => $title,
                    'list' => $this->list,
                    'model' => $this->model,
                    'cols' => $this->cols,
                    'countListView' => $this->countListView
        ]);
    }
}