<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\helpers\FileHelper;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@frontend/assets/source';
    public $css = [
	'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800&amp;subset=cyrillic,cyrillic-ext',
	'bootstrap/css/bootstrap.min.css',
	'js/owlcarousel/owl.carousel.min.css',
	'js/select2/select2.min.css',
	//'js/jquery-ui/jquery-ui.css',
	'js/jquery-ui/jquery-ui-custom.css',
	'css/style.css',
	'css/responsive.css',
    ];
    public $js = [
        /*
	//'/js/jquery2.2.4.js',
	'bootstrap/js/bootstrap.min.js',
	'js/owlcarousel/owl.carousel.min.js',
	//'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
	'js/jquery-ui/jquery-ui.min.js',
	'js/jquery.ui.touch-punch.min.js',
	'js/inputmask/inputmask.min.js',
	'js/inputmask/inputmask.phone.extensions.min.js',
	'js/inputmask/jquery.inputmask.min.js',
	'//cloud.tinymce.com/stable/tinymce.min.js',
	'js/select2/select2.full.min.js',
	'js/script.js' */
        "bootstrap/js/bootstrap.min.js",
        "js/owlcarousel/owl.carousel.min.js",
        "js/jquery-ui/jquery-ui.min.js",
        "js/jquery.ui.touch-punch.min.js",
        "js/inputmask/inputmask.min.js",
        "js/inputmask/inputmask.phone.extensions.min.js",
        "js/inputmask/jquery.inputmask.min.js",
        "js/select2/select2.full.min.js",
        'chart/Chart.bundle.min.js',
        "js/script.js",
    ];
    public $depends = [
	    //'yii\web\YiiAsset',
    ];
    //public $jsOptions = ['position' => \yii\web\View::POS_END];
    public function init() {
    /*
        $path = \Yii::getAlias("@frontend/assets/source");
        $files = FileHelper::findFiles($path, ['recursive' => true]);
        foreach ($files as $item) {
            $fileNameArr = explode(".", $item);
            $fileName = str_replace($path.DIRECTORY_SEPARATOR, "", $item);
            switch (end($fileNameArr)) {
                case 'js': 
                    $this->js[] = $fileName;
                    break;
                case 'css':/*
                    if($fileName != 'css/style.css') {
                        $this->css[] = $fileName;
                    }*
                    break;
            }
        }*/
        $this->css[] = 'css/style.css';
        parent::init();
    }

}
