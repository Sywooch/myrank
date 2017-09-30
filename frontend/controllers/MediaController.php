<?php

namespace frontend\controllers;

use Yii;
use frontend\components\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use frontend\models\Images;
use yii\helpers\Json;
use frontend\models\User;
use yii\helpers\Url;
use frontend\models\UserConstant;

class MediaController extends Controller {
    
    public $path;

    public function actionImageupload($id) {
	$sess = \Yii::$app->session;
	if($sess->has('userImages')) {
	    $sessImages = $sess->get('userImages');
	}
	$model = new Images();
	$userId = Yii::$app->user->id;
	$imageFile = UploadedFile::getInstance($model, 'name' . $id);
        
        $mObj = UserConstant::getProfile();

	$directory = $this->userImagePath . $mObj->id . DIRECTORY_SEPARATOR;
	if (!is_dir($directory)) {
	    FileHelper::createDirectory($directory);
	}

	if ($imageFile) {
	    $uid = uniqid(time(), true);
	    $fileName = $uid . '.' . $imageFile->extension;
	    $filePath = $directory . $fileName;
	    if ($imageFile->saveAs($filePath)) {
		$path = $this->files . $mObj->saveFolder . DIRECTORY_SEPARATOR . $mObj->id . DIRECTORY_SEPARATOR . $fileName;
		$sessImages[$id] = $fileName;
		$sess->set('userImages', $sessImages);
		$out = [
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
		];
	    } else {
		$out['errors'] = \Yii::t('app','FILE_NOT_SAVED');
	    }
	} else {
	    $out['errors'] = \Yii::t('app','FILE_NOT_UPLOADED');
	}

	echo Json::encode($out);
	\Yii::$app->end();
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
    
    public function actionViewimage ($id, $user = 0) {
	$path = Yii::getAlias('@frontend/web');
	switch ($user) {
	    case 0:
		$model = Images::findOne($id);
		$id = $model->user_id;
		$path .= "/files/" . $id . DIRECTORY_SEPARATOR . $model->name;
		break;
	    case 1: 
		$model = User::findOne($id);
		$path .= "/files/" . $model->id . DIRECTORY_SEPARATOR . $model->image;
		break;
	    default :
		$path .= "/files/".$user. DIRECTORY_SEPARATOR . $id;
		break;
	}
	header('Content-type: image/png');
	readfile($path);
    }
    
    public function actionDeletePortfolio ($id) {
        $get = Yii::$app->request->get();
        if(isset($get['newphoto']) && $get['newphoto'] == 1) {
            $session = Yii::$app->session;
            if($session->has('userImages')) {
                $images = $session->get('userImages');
                unset($images[$id]);
                $session->set('userImages', $images);
            }
        } else {
            Images::deleteAll(['id' => $id]);
        }
        return Json::encode(['code' => 1]);
    }

    public function beforeAction($action) {
	$actArr = ['imageupload', 'imagedelete'];
	if (in_array($action->id, $actArr)) {
	    $this->enableCsrfValidation = false;
	}

	return parent::beforeAction($action);
    }

}
