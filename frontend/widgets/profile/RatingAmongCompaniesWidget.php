<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\widgets\profile;

use yii\base\Widget;
use frontend\models\Company;

class RatingAmongCompaniesWidget extends Widget {
    
    public $list;
    public $model;
    public $count = 5;
    
    private $queryArr = [];

    public function init() {
        parent::init();
        $this->randomList();
    }
    
    public function run() {
        $model = $this->randomList();
        return $this->render("ratingAmongCompanies", ['model' => $model]);
    }
    
    private function randomList () {
        $count = Company::find()->count();
        $arr = [];
        while (count($arr) < $this->count) {
            $arr[] = '(SELECT * FROM company LIMIT '.rand(0, $count).', 1)';
        }
        $query = implode(' UNION ', $arr);
        
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand($query);
        $result = $command->queryAll();
        return $result;
    }
    
}