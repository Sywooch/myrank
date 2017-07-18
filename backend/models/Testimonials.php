<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace backend\models;

class Testimonials extends \frontend\models\Testimonials {
    
    public function getClaim () {
        return $this->hasOne(UserClaim::className(), ['obj_id' => 'id'])
                ->andWhere(['obj' => UserClaim::OBJ_TYPE_TESTIMONIALS]);
    }
    
    public function beforeDelete() {
        static::deleteAll(['parent_id' => $this->id]);
        return parent::beforeDelete();
    }
}
