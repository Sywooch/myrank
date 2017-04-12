<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800&amp;subset=cyrillic,cyrillic-ext',
	'/bootstrap/css/bootstrap.min.css',
	'/js/owlcarousel/owl.carousel.min.css',
	'/js/select2/select2.min.css',
	'/css/style.css',
	'/css/responsive.css',
	'/js/jquery-ui/jquery-ui-custom.css'
    ];
    public $js = [
	//'/js/jquery2.2.4.js',
	'/bootstrap/js/bootstrap.min.js',
	'/js/owlcarousel/owl.carousel.min.js',
	'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
	'/js/jquery.ui.touch-punch.min.js',
	'/js/inputmask/inputmask.min.js',
	'/js/inputmask/inputmask.phone.extensions.min.js',
	'/js/inputmask/jquery.inputmask.min.js',
	'//cloud.tinymce.com/stable/tinymce.min.js',
	'/js/select2/select2.full.min.js',
	'/js/script.js'
    ];
    public $depends = [
	//'yii\web\YiiAsset',
    ];
    public $jsOptions = [ 'position' => \yii\web\View::POS_END ];

}
