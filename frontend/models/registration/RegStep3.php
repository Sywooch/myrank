<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models\registration;

class RegStep3 extends \frontend\models\Company {
    
    public function rules() {
        return [
            [['name', 'reg_date', 'phone'], 'required'],
            [['count_persons', 'cash'], 'integer'],
            [['reg_date', 'user_id', 'city_id', 'professionField', 'image', 'marks_config', 'mark', 'rating'], 'safe'],
            [['about'], 'string'],
            [['phone', 'director', 'contact_face'], 'string', 'max' => 255], 
        ];
    }
}
