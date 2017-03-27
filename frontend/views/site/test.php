<?php

use frontend\widgets\image\FileUploadWidget;
use frontend\models\Images;
use dosamigos\fileupload\FileUpload;

$model = new Images();
// without UI
?>

<?php

for ($i = 1; $i <= 5; $i++) {
    echo FileUploadWidget::widget([
	'model' => $model,
	'attribute' => 'name' . $i,
	'url' => ['media/imageupload', 'id' => $i],
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
}
?>