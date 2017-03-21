<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profession".
 *
 * @property integer $id
 * @property string $title
 */
class Profession extends \yii\db\ActiveRecord {
    
    public $listProf;

    /**
     * @inheritdoc
     */
    public static function tableName() {
	return 'profession';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
	return [
	    [['title'], 'string', 'max' => 255],
	    [['listProf'], 'safe']
	];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('app', 'ID'),
	    'title' => Yii::t('app', 'Title'),
	    'listProf' => Yii::t('app', 'Список'),
	];
    }
    
    public function beforeSave($insert) {
	if($this->listProf != "") {
	    $arr = explode("\n", $this->listProf);
	    foreach ($arr as $item) {
		if($this->title == "") {
		    $this->title = $item;
		} else {
		    $m = new Profession();
		    $m->title = $item;
		    $m->save();
		}
	    }
	}
	return parent::beforeSave($insert);
    }

}
