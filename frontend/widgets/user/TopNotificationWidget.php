<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\widgets\user;

use yii\base\Widget;
use frontend\models\UserConstant;

class TopNotificationWidget extends Widget {
    
    public $userTrustees;
    public $userMarks;
    public $testimonials;
    
    public function init() {
        $mObj = UserConstant::getProfile();
        $this->userTrustees = $mObj->getUserTrusteesTo();
        $this->userMarks = $mObj->getUserMarksTo();
        $this->testimonials = $mObj->getTestimonialsActive()->andWhere(['parent_id' => 0]);
        return parent::init();
    }
    
    public function run() {
        return $this->render("topNotification", [
            'trust' => $this->userTrustees,
            'marks' => $this->userMarks,
            'testimonials' => $this->testimonials,
        ]);
    }
}
