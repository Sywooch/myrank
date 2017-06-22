<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\site;

use yii\base\Widget;

class Breadcrumbs extends Widget {
    
    private $view = 'breadcrumbs';
    public $links = [];
    
    public function init() {
	parent::init();
	//$this->view = "bestRating_" . $this->tmpl;
    }
    
    public function run() {
	parent::run();
	return $this->render($this->view, ['links' => $this->links]);
    }
}
