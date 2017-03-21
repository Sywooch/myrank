<?php

namespace frontend\widgets\image;

use dosamigos\fileupload\FileUpload;
use frontend\widgets\image\FileUploadAsset;
use yii\helpers\Json;

class FileUploadWidget extends FileUpload {

    /**
     * Registers required script for the plugin to work as jQuery File Uploader
     */
    public function registerClientScript() {
	$view = $this->getView();

	FileUploadAsset::register($view);
	
	$options = Json::encode($this->clientOptions);
	$id = $this->options['id'];

	$js[] = ";jQuery('#$id').fileupload($options);";
	if (!empty($this->clientEvents)) {
	    foreach ($this->clientEvents as $event => $handler) {
		$js[] = "jQuery('#$id').on('$event', $handler);";
	    }
	}
	$view->registerJs(implode("\n", $js), \yii\web\View::POS_END);
    }

}
