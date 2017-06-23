<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "company" and "user".
 *
 * @property integer $isCompany
 * @property integer $objType return USER or COMPANY type
 * @property object $objModel return USER or COMPANY model
 * @property string $saveFolder return USER or COMPANY model
 */
class UserConstant extends \yii\db\ActiveRecord {

    const TYPE_USER_USER = 0;
    const TYPE_USER_COMPANY = 1;
    const TYPE_USER_ADMIN = 10;
    const SAVE_FOLDER_USER = 'user';
    const SAVE_FOLDER_COMPANY = 'company';
    
    public function getUserTrusteesAll () {
        return "";
    }

    public function getUserTrusteesTo() {
        return $this->hasMany(UserTrustees::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->objType]);
    }

    public function getUserTrusteesFrom() {
        return $this->hasMany(UserTrustees::className(), ['from_id' => 'id'])
                        ->andWhere(['type_from' => $this->objType]);
    }

    public function getUserMarksTo() {
        return $this->hasMany(UserMarks::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->objType]);
    }

    public function getUserMarksFrom() {
        return $this->hasMany(UserMarks::className(), ['from_id' => 'id'])
                        ->andWhere(['type_from' => $this->objType]);
    }

    public function getUserMarkRatingTo() {
        return $this->hasMany(UserMarkRating::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => self::TYPE_USER_USER]);
    }

    public function getTestimonial() {
        $mObj = \Yii::$app->user->identity;
        return $this->getTestimonialsTo()->andWhere([
                    'from_id' => $mObj->isCompany ? $mObj->company_id : $mObj->id,
                    'type_from' => $mObj->objType,
        ]);
    }

    public function getTestimonialsTo() {
        return $this->hasMany(Testimonials::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->objType]);
    }

    public function getTestimonialsFrom() {
        $mObj = \Yii::$app->user->identity;
        return $this->hasMany(Testimonials::className(), ['from_id' => 'id'])
                        ->andWhere(['type_from' => $mObj->objType]);
    }

    public function getHasTestimonial() {
        return $this->getTestimonialsFrom()->count() > 0;
    }

    public function getTestimonialsActive() {
        return $this->getTestimonialsTo()->andWhere(['status' => Testimonials::STATUS_ACTIVE]);
    }

    public function getImages() {
        return $this->hasMany(Images::className(), ['type_id' => 'id'])
                        ->andWhere(['type' => $this->objType]);
    }

    public function getProfession() {
        $model = $this->isCompany ? CompanyProfession::className() : UserProfession::className();
        $index = $this->isCompany ? 'company_id' : 'user_id';
        return $this->hasMany($model, [$index => 'id']);
    }

    public function getUserProfession() {
        return $this->hasMany(Profession::className(), ['id' => 'profession_id'])->via("profession");
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
    
    public function getSaveFolder () {
        return $this->isCompany ? self::SAVE_FOLDER_COMPANY : self::SAVE_FOLDER_USER;
    }

    public function getImageName() {
        return $this->image == "" ? "/images/no_photo.png" : DIRECTORY_SEPARATOR . implode("/", [
            'files',
            $this->saveFolder,
            $this->objId,
            $this->objImage
        ]);
    }

    public function getProfileLink() {
        return $this->isCompany ? [
            'company/profile',
            'id' => isset($this->company_id) ? $this->company_id : $this->id
                ] : ['users/profile', 'id' => $this->id];
    }

    public function getFullName() {
        return $this->isCompany ? $this->name : $this->last_name . " " . $this->first_name;
    }

    public function getOwner() {
        if (\Yii::$app->user->id !== NULL) {
            $mObj = \Yii::$app->user->identity;
            return $this->isCompany ? $mObj->company_id == $this->id : $this->id == $mObj->id;
        }
        return false;
    }

    public function getProfileProfession() {
        return ($this->isCompany) ? $this->companyProfession : $this->userProfession;
    }

    // FIXME: Сделать через связующую таблицу
    public static function getProfile() {
        $model = \Yii::$app->user->identity;
        return $model->isCompany ? Company::findOne($model->company_id) : User::findOne($model->id);
    }
    
    public function getObjType () {
        return $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER;
    }
    
    public function getObjModel () {
        return $this->isCompany ? Company::className() : User::className();
    }
    
    // FIXME: Сделать через связующую таблицу
    public function getObjId () {
        return isset($this->type) && $this->isCompany ? $this->company_id : $this->id;
    }
    
    // FIXME: Сделать через связующую таблицу
    public function getObjImage () {
        return isset($this->type) && $this->isCompany ? $this->company->image : $this->image;
    }

}
