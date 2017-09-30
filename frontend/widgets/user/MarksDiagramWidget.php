<?php

namespace frontend\widgets\user;


use yii\helpers\Json;


class MarksDiagramWidget extends MarksWidget
{


    public $model;

    public $view = "marksDiagram_new";

    public $allList;

    public $list;

    public $userList;

    private $myView = true;


    public function init()
    {
        parent::init();
        $out = [];

        $markUsers = $this->model->getUserMarksTo()->select('description')->asArray()->all();
        foreach ($markUsers as $item) {
            $arr = Json::decode($item['description'], true);

            if (isset($arr[0])) {
                foreach ($arr[0] as $key => $el) {
                    if (isset($out[$key])) {
                        $out[$key] += (($el != 0.0) ? $el / count($markUsers) : $el);
                    } else {
                        $out[$key] = (($el != 0.0) ? $el / count($markUsers) : $el);
                    }
                }
            }
        }
        $marksConfig = Json::decode($this->model->marks_config, true);
        $this->myView = (isset($marksConfig['myview']) && ($marksConfig['myview'] == 1));
        $this->userList = (isset($this->model->mark) && $this->myView) ? Json::decode($this->model->mark, TRUE) : [];
        $this->list = $out;
    }


    public function run()
    {
        return $this->render($this->view, [
                'allList' => $this->allList,
                'list' => $this->list,
                'userList' => isset($this->userList[0]) ? $this->userList[0] : [],
                'myView' => $this->myView
        ]);
    }
}
