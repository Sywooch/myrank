<?php

namespace frontend\models;

use Yii;
use yii\helpers\Json;

//use frontend\models\UserConstant;

/**
 * This is the model class for table "user_marks".
 *
 * @property integer $id
 * @property integer $user_to
 * @property integer $user_from
 * @property string $description
 * @property string $created
 */
class UserMarks extends UserConstant {

    const COUNT_LIST_USER_PROFILE = 5;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_marks';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['to_id', 'from_id', 'type_from', 'type_to'], 'integer'],
            [['description'], 'string'],
            [['who_from_to'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_to' => 'USER_TO',
            'user_from' => 'USER_FROM',
            'description' => 'DESCRIPTION',
            'created' => 'CREATED',
        ];
    }

    public function getUser() {
        $class = ($this->type_from == User::TYPE_USER_COMPANY) ? Company::className() : User::className();
        return $this->hasOne($class, ['id' => 'from_id']);
    }

    public function getDescrArr() {
        $out = Json::decode($this->description, true);
        return $out[0];
    }

    public function getMarkNames() {
        $model = Marks::find()->where(['parent_id' => 0])->all();
        foreach ($model as $item) {
            $out[$item->id] = $item->name;
        }
        return $out;
    }
    
    public function getAllMarkName () {
        $out = [];
        $model = Marks::find()->all();
        foreach ($model as $item) {
            $out[$item->parent_id][$item->id] = $item->name;
        }
        return $out;
    }

}
