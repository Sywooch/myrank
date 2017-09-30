<?php

namespace frontend\widgets\user;

use yii\base\Widget;
use yii\helpers\Json;

class UserInfoWidget extends Widget {
    
    public $model;
    public $fields = [];
    
    private $viewField = [];
    
    public function init() {
	parent::init();
        $this->viewField = [
            
        ];
    }
    
    public function run() {
	parent::run();
        $fieldsName = $this->model->attributeLabels();
	return $this->render("userInfoWidget", [
            'fields' => $this->fields,
            'fieldsName' => $fieldsName,
            'model' => $this->model,
        ]);
    }
}
