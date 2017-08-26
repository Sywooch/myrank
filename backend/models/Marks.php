<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace backend\models;

use yii\helpers\ArrayHelper;

class Marks extends \frontend\models\Marks {
    
    public $profsField;
    public $parse;
    
    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), [
            'profsField' => 'Направление'
        ]);
    }
    
    public function getProfessionMarkValue () {
        return $this->hasMany(\frontend\models\Profession::className(), ['id' => 'profession_id'])->via('professionMarks');
    }

    public function getProfessionMarks () {
        return $this->hasMany(ProfessionMarks::className(), ['mark_id' => 'id']);
    }
    
    public function getProfessionMarksArr () {
        return ArrayHelper::map($this->getProfessionMarkValue()->asArray()->all(), 'id', 'title');
    }

    public function afterSave($insert, $changedAttributes) {
        if(isset($this->profsField) && (count($this->profsField) > 0)) {
            ProfessionMarks::deleteAll(['mark_id' => $this->id]);
            if($this->profsField != "") {
                foreach ($this->profsField as $key => $item) {
                    $mProfMarks = new ProfessionMarks();
                    $mProfMarks->profession_id = $item;
                    $mProfMarks->mark_id = $this->id;
                    $mProfMarks->save();
                }
            }
        }
        
        return parent::afterSave($insert, $changedAttributes);
    }
    
    public function beforeSave($insert) {
        return parent::beforeSave($insert);
    }
    
    public function beforeDelete() {
        return parent::beforeDelete();
    }
}
