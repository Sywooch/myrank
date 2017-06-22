<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "company".
 *
 * @property integer $isCompany
 */
class UserConstant extends \yii\db\ActiveRecord {

    const TYPE_USER_USER = 0;
    const TYPE_USER_COMPANY = 1;
    const TYPE_USER_ADMIN = 10;

    public function getUserTrusteesTo() {
        return $this->hasMany(UserTrustees::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    public function getUserTrusteesFrom() {
        return $this->hasMany(UserTrustees::className(), ['from_id' => 'id'])
                        ->andWhere(['type_from' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    public function getUserMarksTo() {
        return $this->hasMany(UserMarks::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    public function getUserMarksFrom() {
        return $this->hasMany(UserMarks::className(), ['from_id' => 'id'])
                        ->andWhere(['type_from' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    public function getUserMarkRatingTo() {
        return $this->hasMany(UserMarkRating::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => self::TYPE_USER_USER]);
    }

    public function getTestimonialsTo() {
        return $this->hasMany(Testimonials::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    public function getTestimonialsFrom() {
        return $this->hasMany(Testimonials::className(), ['from_id' => 'id'])
                        ->andWhere(['type_from' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    public function getHasTestimonial() {
        return $this->getTestimonialsFrom()->count() > 0;
    }

    public function getTestimonialsActive() {
        return $this->getTestimonialsTo()->andWhere(['status' => Testimonials::STATUS_ACTIVE]);
    }

    public function getImages() {
        return $this->hasMany(Images::className(), ['type_id' => 'id'])
                        ->andWhere(['type' => $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER]);
    }

    /**
     * 
     * @return type
     * 
     * FIXME: Сделать через связующую таблицу
     */
    public function getUserMarksFromList() {
        $mUserFrom = \Yii::$app->user->identity;
        $model = $this->getUserMarksTo()
                ->andWhere([
                    'from_id' => $mUserFrom->isCompany ? $mUserFrom->company_id : $mUserFrom->id,
                ])
                ->one();
        return isset($model->description) ? Json::decode($model->description, true) : [];
    }

    public function getConfigMarks() {
        return is_null($this->marks_config) ? [] : Json::decode($this->marks_config, true);
    }

    public function getMarks() {
        $configMarksArr = $this->configMarks;
        $arr = [];

        $model = Marks::find()->all();
        foreach ($model as $item) {
            if (isset($configMarksArr[$item->parent_id])) {
                if ($configMarksArr[$item->parent_id] == Marks::MARKS_ACCESS_FRONT_ALL) {
                    $arr[$item->parent_id][$item->id] = $item->name;
                }
            } else {
                $arr[$item->parent_id][$item->id] = $item->name;
            }
        }
        return $arr;
    }

    public function getTrustUser() {
        return $this->getUserTrusteesTo()->andWhere(['from_id' => \Yii::$app->user->id])->count() > 0 ? TRUE : FALSE;
    }

    public function getAboutProfile() {
        return $this->about;
    }

    public function getImageName() {
        return $this->image == "" ? "/images/no_photo.png" : Url::toRoute([
                    'media/viewimage',
                    'id' => $this->id,
                    'user' => 1
        ]);
    }

    public function getProfileLink() {
        return $this->isCompany ? ['company/profile', 'id' => $this->company_id] : ['users/profile', 'id' => $this->id];
    }

    public function getFullName() {
        return $this->isCompany ? $this->name : $this->last_name . " " . $this->first_name;
    }

    public function getOwner() {
        if (\Yii::$app->user->id !== NULL) {
            $userId = \Yii::$app->user->id;
            return $this->isCompany ? false : $this->id == $userId;
        }
        return false;
    }

    public function getProfileProfession() {
        return ($this->isCompany) ? $this->companyProfession : $this->userProfession;
    }
    
    // FIXME: Сделать через связующую таблицу
    public static function getProfile () {
        $model = \Yii::$app->user->identity;
        return $model->type == self::TYPE_USER_COMPANY ? Company::findOne($model->company_id) : User::findOne($model->id);
    }

}
