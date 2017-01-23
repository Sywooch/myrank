<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/bootstrap/css/bootstrap.min.css',
	'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
	'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
	'/dist/css/AdminLTE.min.css',
	'/dist/css/skins/_all-skins.min.css',
	'/plugins/iCheck/flat/blue.css',
	'/plugins/morris/morris.css',
	'/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
	'/plugins/datepicker/datepicker3.css',
	'/plugins/daterangepicker/daterangepicker.css',
	'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
	'/plugins/jQuery/jquery-2.2.3.min.js',
	'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
	'/bootstrap/js/bootstrap.min.js',
	'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
	'/plugins/morris/morris.min.js',
	'/plugins/sparkline/jquery.sparkline.min.js',
	'/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
	'/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
	'/plugins/knob/jquery.knob.js',
	'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
	'/plugins/daterangepicker/daterangepicker.js',
	'/plugins/datepicker/bootstrap-datepicker.js',
	'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
	'/plugins/slimScroll/jquery.slimscroll.min.js',
	'/plugins/fastclick/fastclick.js',
	'/dist/js/app.min.js',
	'/dist/js/pages/dashboard.js',
	'/dist/js/demo.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
