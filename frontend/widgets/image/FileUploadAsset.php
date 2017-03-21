<?php
namespace frontend\widgets\image;

use yii\web\AssetBundle;

class FileUploadAsset extends AssetBundle {
    
    public $sourcePath = '@bower/blueimp-file-upload';
    public $css = [
        'css/jquery.fileupload.css'
    ];
    public $js = [
        //'js/vendor/jquery.ui.widget.js',
        'js/jquery.iframe-transport.js',
        'js/jquery.fileupload.js'
    ];
    public $jsOptions = [ 'position' => \yii\web\View::POS_END ];
}