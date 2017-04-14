<?php

namespace frontend\controllers;

use Yii;
use frontend\components\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use frontend\models\Images;
use yii\helpers\Json;

class MediaController extends Controller {
    
    public $path;

    public function actionImageupload($id) {
	$sess = \Yii::$app->session;
	if($sess->has('userImages')) {
	    $sessImages = $sess->get('userImages');
	}
	$model = new Images();

	$imageFile = UploadedFile::getInstance($model, 'name' . $id);

	$directory = $this->userImagePath . Yii::$app->user->id . DIRECTORY_SEPARATOR;
	if (!is_dir($directory)) {
	    FileHelper::createDirectory($directory);
	}

	if ($imageFile) {
	    $uid = uniqid(time(), true);
	    $fileName = $uid . '.' . $imageFile->extension;
	    $filePath = $directory . $fileName;
	    if ($imageFile->saveAs($filePath)) {
		$path = $this->files . Yii::$app->user->id . DIRECTORY_SEPARATOR . $fileName;
		$sessImages[] = $path;
		$sess->set('userImages', $sessImages);
		echo Json::encode([
		    'files' => [
			[
			    'name' => $fileName,
			    'size' => $imageFile->size,
			    'url' => $path,
			    'thumbnailUrl' => $path,
			    'deleteUrl' => 'image-delete?name=' . $fileName,
			    'deleteType' => 'POST',
			    'mImages' => $model->id,
			    'fieldId' => $id,
			],
		    ],
		]);
		\Yii::$app->end();
	    } else {
		$out['errors'] = "Не сохранило файл";
	    }
	} else {
	    $out['errors'] = "Не загрузило файл";
	}

	echo Json::encode($out);
    }

    public function actionImagedelete($name) {
	$directory = Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
	if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
	    unlink($directory . DIRECTORY_SEPARATOR . $name);
	}

	$files = FileHelper::findFiles($directory);
	$output = [];
	foreach ($files as $file) {
	    $fileName = basename($file);
	    $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
	    $output['files'][] = [
		'name' => $fileName,
		'size' => filesize($file),
		'url' => $path,
		'thumbnailUrl' => $path,
		'deleteUrl' => 'image-delete?name=' . $fileName,
		'deleteType' => 'POST',
	    ];
	}
	return Json::encode($output);
    }
    
    public function actionViewimage ($id, $name) {
	$src = $_GET['img'];
	header('Content-type: image/png');
	readfile("img/{$src}");
    }

    public function beforeAction($action) {
	$actArr = ['imageupload', 'imagedelete'];
	if (in_array($action->id, $actArr)) {
	    $this->enableCsrfValidation = false;
	}

	return parent::beforeAction($action);
    }

}
