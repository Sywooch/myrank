<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use yii\helpers\Json;
use backend\models\Marks;
use frontend\models\UserMarksCustom;

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
        $arr = [];
        if($this->model->isCompany) {
            $mUser = $this->model->profileProfession;
            foreach ($mUser as $item) {
                $arr[0]['p'.$item->id] = $item->title;
                foreach ($item->professionMarksValue as $item2) {
                    $arr['p' . $item->id][$item2->id] = $item2->name;
                }
            }
        }
        
        $configMarksArr = $this->model->configMarks;

        $mMarks = Marks::find()->where(['type' => $this->model->objType, 'prof_only' => 0])->all();
        $mUMC = UserMarksCustom::find()
                ->where([
                    'user_id' => $this->model->objId, 
                    'user_type' => $this->model->objType
                ])
                ->asArray()
                ->all();
        foreach ($mMarks as $item) {
            if (isset($configMarksArr[$item->parent_id])) {
                if ($configMarksArr[$item->parent_id] == Marks::MARKS_ACCESS_FRONT_ALL) {
                    $arr[$item->parent_id][$item->id] = $item->name;
                }
            } else {
                $arr[$item->parent_id][$item->id] = $item->name;
            }
            
            $names[$item->id] = $item->name;
        }
        
        foreach ($mUMC as $item) {
            $arr[$item['parent_id']][$item['mark_id']] = $names[$item['mark_id']];
        }
        return $arr;
    }

}
