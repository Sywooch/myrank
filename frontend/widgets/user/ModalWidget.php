<?php
namespace frontend\widgets\user;

use yii\base\Widget;

class ModalWidget extends Widget {
    
    public $title = "";
    public $content;
    public $model;
    public $formOptions = [];
    public $success = "";
    public $script = "";
    
    public $view = 'modal';
    
    public function init() {
	parent::init();
	
    }
    
    public function run() {
	parent::run();
	return $this->render("modal/" . $this->view, [
	    'content' => $this->content, 
	    'title' => $this->title,
	    'formOptions' => $this->formOptions,
	    'model' => $this->model,
	    'success' => $this->success,
	    'script' => $this->script
	]);
    }
}