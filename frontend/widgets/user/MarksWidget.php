<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use yii\helpers\Json;
use frontend\models\Marks;

class MarksWidget extends Widget {

    public $model;
    public $allList;
    public $list;
    public $view = "marksView";
    private $title;

    public function init() {
        parent::init();

        $this->allList = $this->getMarks();
        if ($this->model->owner) {
            $this->title = \Yii::t('app', 'MARK_MINE');
            $this->list = Json::decode($this->model->mark, true);
        } else {
            $this->title = \Yii::t('app', 'MARK');
            $this->list = $this->model->getUserMarksFromList();
        }
    }

    public function run() {
        return $this->render("marks/" . $this->view, [
                    'allList' => $this->allList,
                    'list' => $this->list,
                    'model' => $this->model,
                    'title' => $this->title,
        ]);
    }

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
    }

}
