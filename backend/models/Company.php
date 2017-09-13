<?php

namespace backend\models;

use frontend\models\Images;
use frontend\models\UserMarks;
use frontend\models\UserNotification;
use frontend\models\UserMarkRating;
use frontend\models\CompanyProfession;
use frontend\models\UserTrustees;

class Company extends \frontend\models\Company {
    
    public function beforeDelete() {
        Images::deleteAll(['type' => 1, 'type_id' => $this->id]);

        $condFrom = ['type_from' => 1, 'from_id' => $this->id];
        $condTo = ['type_to' => 1, 'to_id' => $this->id];

        Testimonials::deleteAll($condFrom);
        Testimonials::deleteAll($condTo);

        UserMarks::deleteAll($condFrom);
        UserMarks::deleteAll($condTo);

        UserMarkRating::deleteAll($condFrom);
        UserMarkRating::deleteAll($condTo);

        UserNotification::deleteAll(['user_id' => $this->id, 'user_type' => 1]);

        CompanyProfession::deleteAll(['company_id' => $this->id]);

        UserTrustees::deleteAll($condFrom);
        UserTrustees::deleteAll($condTo);

        UserCompany::deleteAll(['user_id' => $this->id]);
        
        return parent::beforeDelete();
    }
}
