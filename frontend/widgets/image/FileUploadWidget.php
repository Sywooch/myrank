<?php

namespace frontend\widgets\image;

use dosamigos\fileupload\FileUpload;
use dosamigos\fileupload\FileUploadAsset;

class FileUploadWidget extends FileUpload {
    
    public function run() {
	$view = $this->getView();
        FileUploadAsset::register($view);
    }

}
