<?php

use frontend\widgets\image\FileUploadWidget;
use frontend\models\Images;

$model = new Images();
// without UI
?>

<?=

FileUploadWidget::widget([
    'model' => $model,
    'attribute' => 'name',
    'url' => ['media/upload', 'id' => 1], // your url, this is just for demo purposes,
    'options' => ['accept' => 'image/*'],
    'clientOptions' => [
	'maxFileSize' => 2000000
    ],
    // Also, you can specify jQuery-File-Upload events
    // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options
    'clientEvents' => [
	'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
	'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]);
?>