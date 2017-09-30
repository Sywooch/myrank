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
        $this->list = $this->model->getUserMarksTo()->orderBy('id DESC')->all();
    }

    public function run() {
        $title = $this->model->isCompany ? \Yii::t('app', 'COMPANY_MARKS') : \Yii::t('app', 'MY_MARKS');
        return $this->render($this->view, [
                    'title' => $title,
                    'list' => $this->list,
                    'model' => $this->model,
                    'cols' => $this->cols,
                    'countListView' => $this->countListView
        ]);
    }
}