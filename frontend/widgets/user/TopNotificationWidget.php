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
    
    private $mObj;


    public function init() {
        $this->mObj = UserConstant::getProfile();
        $this->userTrustees = $this->mObj->getUserTrusteesTo();
        $this->userMarks = $this->mObj->getUserMarksTo();
        $this->testimonials = $this->mObj->getTestimonialsActive()->andWhere(['parent_id' => 0]);
        return parent::init();
    }
    
    public function run() {
        return $this->render("topNotification", [
            'trust' => $this->userTrustees,
            'marks' => $this->userMarks,
            'testimonials' => $this->testimonials,
            'mObj' => $this->mObj
        ]);
    }
}
