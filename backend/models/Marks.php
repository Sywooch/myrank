<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace backend\models;

class Marks extends \frontend\models\Marks {
    
    public function getChild () {
        
    }
    
    public function beforeDelete() {
        return parent::beforeDelete();
    }
}
