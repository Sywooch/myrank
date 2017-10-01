<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets\profile;

use yii\base\Widget;
use frontend\models\Company;
use frontend\models\Profession;

class RatingAmongCompaniesWidget extends Widget {
    
    public $list;
    public $model;
    public $count = 5;
    
    private $queryArr = [];
    private $profName = "";

    public function init() {
        parent::init();
        $this->randomList();
    }
    
    public function run() {
        $model = $this->randomList();
        return $this->render("ratingAmongCompanies", [
            'model' => $model, 
            'mObj' => $this->model,
            'profName' => $this->profName,
        ]);
    }
    
    private function randomList () {
        $count = Company::find()->count();
        $q = "";
        $mProfession = Profession::find()->where(['id' => $this->model->main_prof])->one();
        if($this->model->isCompany && isset($mProfession->id)) {
            $q = "WHERE main_prof = " . $this->model->main_prof;
            $this->profName = isset($mProfession->title) ? $mProfession->title : "";
        }
        
        $arr = [];
        while (count($arr) < $this->count) {
            $arr[] = '(SELECT * FROM company '.$q.' LIMIT '.rand(0, $count).', 1)';
        }
        $query = implode(' UNION ', $arr);
        
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand($query);
        $result = $command->queryAll();
        return $result;
    }
    
}