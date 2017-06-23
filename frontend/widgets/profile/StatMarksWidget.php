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

    public function init() {
        $this->list = $this->model->userMarksTo;
    }

    public function run() {
        return $this->render($this->view, [
                    //'allList' => $this->allList,
                    'list' => $this->list,
                    'model' => $this->model,
                    //'title' => $this->title,
        ]);
    }
/*
    public function getMarks() {
        $configMarksArr = $this->model->configMarks;
        $arr = [];

        $model = Marks::find()->all();
        foreach ($model as $item) {
            if (isset($configMarksArr[$item->parent_id])) {
                if ($configMarksArr[$item->parent_id] == Marks::MARKS_ACCESS_FRONT_ALL) {
                    $arr[$item->parent_id][$item->id] = $item->name;
                }
            } else {
                $arr[$item->parent_id][$item->id] = $item->name;
            }
        }
        return $arr;
    }*/
}