<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\actions;

use yii\base\Action;
use yii\helpers\Json;
use frontend\models\UserNotification;
use frontend\models\UserConstant;
use frontend\models\UserTrustees;
use frontend\models\UserMarks;
use frontend\models\Testimonials;

class NotificationSeenAction extends Action {
    
    public $id;
    public $type;
    public $act;
    public $post;
    
    private $mObj;
    private $code;
    private $params;
    private $data;

    public function init() {
        $this->mObj = UserConstant::getProfile();
        $this->params = ['to_id' => $this->mObj->objId, 'type_to' => $this->mObj->objType];
        switch ($this->act) {
            case 'seen' :
                $this->updateItem();
                break;
            case 'check':
                $this->check();
                break;
        }
    }
    
    public function run () {
        echo Json::encode(['code' => $this->code, 'data' => $this->data]);
    }
    
    public function updateItem () {
        $params = ['id' => $this->id, ];
        
        switch ($this->type) {
            case UserNotification::NOTIF_TYPE_TRUSTEES:
                $model = UserTrustees::findOne($params);
                break;
            case UserNotification::NOTIF_TYPE_MARKS:
                $model = UserMarks::findOne($params);
                break;
            case UserNotification::NOTIF_TYPE_TESTIMONIALS:
                $model = Testimonials::findOne($params);
                break;
        }
        $model->seen = UserNotification::NOTIF_SEEN;
        $this->code = $model->save();
    }
    
    public function check () {
        $mTrustees = $this->mObj->getUserTrusteesTo()->andWhere(['seen' => 0])->orderBy("seen DESC")->limit(10); 
        
        $mMarks = $this->mObj->getUserMarksTo()->andWhere(['seen' => 0]);
        if(isset($this->post['marks'])) {
            $mMarks->andWhere(["!=", 'id', count($this->post['marks']) > 1 ? $this->post['marks'] : $this->post['marks'][0]]);
        }
        $mMarks->orderBy("seen DESC")->limit(10); 
        
        $mTestimonials = $this->mObj->getTestimonialsActive()->andWhere(['parent_id' => 0, 'seen' => 0]);
        if(isset($this->post['testim'])) {
            $mTestimonials->andWhere(["!=", 'id', count($this->post['testim']) > 1 ? $this->post['testim'] : $this->post['testim'][0]]);
        }
        $mTestimonials->orderBy("seen DESC")->limit(10);
        
        $this->data = [
            'trustees' => [
                'count' => (int) $mTrustees->count(),
                'data' => \Yii::$app->view->render('/../widgets/user/views/topNotification/trustees.php', [
                    'model' => $mTrustees->all()
                ])
            ],
            'marks' => [
                'count' => (int) $mMarks->count(),
                'data' => \Yii::$app->view->render('/../widgets/user/views/topNotification/marks.php', [
                    'model' => $mMarks->all()
                ])
            ],
            'testimonials' => [
                'count' => (int) $mTestimonials->count(),
                'data' => \Yii::$app->view->render('/../widgets/user/views/topNotification/testimonials.php', [
                    'model' => $mTestimonials->all()
                ])
            ]
        ];

        $this->code = 1;
    }
}