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
    const TYPE_MARKS_HIDE = 1;
    const TYPE_MARKS_SHOW = 2;

    public $noPhoto = "/images/no_photo.png";

    public static function findModel($cond) {
        $type = $cond['type'];
        unset($cond['type']);
        if ($type == self::TYPE_USER_COMPANY) {
            return Company::findOne($cond['id']);
        } else {
            return User::findOne($cond['id']);
        }
    }

    public function getUserTrusteesAll() {
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

    // View ALL trustess
    public function getUserTrusteesList() {
        return UserTrustees::find()
                        ->onCondition("((to_id = :id AND type_to = :type AND status != :st_to) "
                                . "OR (from_id = :id AND type_from = :type AND status = :st_from)) ", [
                            ':id' => $this->objId,
                            ':type' => $this->objType,
                            ':st_to' => UserTrustees::STATUS_REMOVE,
                            ':st_from' => UserTrustees::STATUS_CONFIRM
                        ])->orderBy('status DESC, id DESC');
    }

    public function getUserTrusteesBack() {
        return UserTrustees::find()
                        ->onCondition("((to_id = :id AND type_to = :type) OR (from_id = :id AND type_from = :type)) AND status = :st", [
                            ':id' => $this->objId,
                            ':type' => $this->objType,
                            ':st' => UserTrustees::STATUS_CONFIRM
                        ])->orderBy('status DESC, id DESC');
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
                    'from_id' => $mObj->objId,
                    'type_from' => $mObj->objType,
        ]);
    }

    public function getTestimonialsTo() {
        return $this->hasMany(Testimonials::className(), ['to_id' => 'id'])
                        ->andWhere(['type_to' => $this->objType]);
    }

    public function getTestimonialsFrom() {
        if (\Yii::$app->user->id !== null) {
            $mObj = \Yii::$app->user->identity;
            return $this->hasMany(Testimonials::className(), ['from_id' => 'id'])
                            ->andWhere(['type_from' => $mObj->objType]);
        }
    }

    public function getHasTestimonial() {
        return $this->getTestimonial()->count() > 0;
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
        if (\Yii::$app->user->id !== null) {
            $mUserFrom = \Yii::$app->user->identity;
            $model = $this->getUserMarksTo()
                    ->andWhere([
                        'from_id' => $mUserFrom->objId,
                    ])
                    ->one();
            $out = isset($model->description) ? Json::decode($model->description, true) : [];
            $out['whofromto'] = isset($model->who_from_to) ? $model->who_from_to : 0;
            return $out;
        } else {
            return [];
        }
    }

    public function getConfigMarks() {
        return is_null($this->marks_config) ? [] : Json::decode($this->marks_config, true);
    }

    public function getMarks() {
        return static::marksArr($this->configMarks);
    }

    /**
     * 
     * @param array $configMarksArr default []
     * @param array $query default NULL
     * @return array
     */
    public static function marksArr($configMarksArr = [], $typeMarks = self::TYPE_MARKS_SHOW) {
        $arr = [];

        $mMarks = Marks::find()->all();
        foreach ($mMarks as $item) {
            if (isset($configMarksArr[$item->parent_id])) {
                if ($configMarksArr[$item->parent_id] == Marks::MARKS_ACCESS_FRONT_ALL) {
                    $arr[self::TYPE_MARKS_SHOW][$item->parent_id][$item->id] = $item->name;
                } else {
                    $arr[self::TYPE_MARKS_HIDE][$item->parent_id][$item->id] = $item->name;
                }
            } else if ($item->parent_id == 0) {
                $arr[self::TYPE_MARKS_SHOW][$item->parent_id][$item->id] = $item->name;
                $arr[self::TYPE_MARKS_HIDE][$item->parent_id][$item->id] = $item->name;
            }
        }
        return isset($arr[$typeMarks]) ? $arr[$typeMarks] : [];
    }

    // FIXME: Сделать через связ таблицу
    public function getTrustUser() {
        $mObj = \Yii::$app->user->identity;
        $id = $mObj->objId;
        return UserTrustees::find()
                        ->andWhere([
                            'from_id' => $id,
                            'type_from' => $mObj->objType,
                            'to_id' => $this->objId,
                            'type_to' => $this->objType,
                            'status' => UserTrustees::STATUS_CONFIRM
                        ])
                        ->orWhere([
                            'from_id' => $this->objId,
                            'type_from' => $this->objType,
                            'to_id' => $id,
                            'type_to' => $mObj->objType,
                            'status' => UserTrustees::STATUS_CONFIRM
                        ])
                        ->count() > 0 ? TRUE : FALSE;
    }

    public function getAboutProfile() {
        $string = strip_tags($this->about);
        $string = substr($string, 0, 500);
        $string = rtrim($string, "!,.-");
        $string = substr($string, 0, strrpos($string, ' '));
        
        return $string;
    }

    public function getSaveFolder() {
        return $this->isCompany ? self::SAVE_FOLDER_COMPANY : self::SAVE_FOLDER_USER;
    }

    public function getImageName() {
        return $this->objImage == "" ? $this->noPhoto : DIRECTORY_SEPARATOR . implode("/", [
                    'files',
                    $this->saveFolder,
                    $this->objId,
                    $this->objImage
        ]);
    }

    public function getProfileLink() {
        return $this->isCompany ? [
            'company/profile',
            'id' => $this->objId
                ] : ['users/profile', 'id' => $this->id];
    }

    public function getFullName() {
        return $this->isCompany ? $this->name : $this->last_name . " " . $this->first_name;
    }

    public function getOwner() {
        if (\Yii::$app->user->id !== NULL) {
            $mObj = \Yii::$app->user->identity;
            return $this->isCompany ? $mObj->objId == $this->id : $this->id == $mObj->id;
        }
        return false;
    }

    public function getProfileProfession() {
        if ($this->isCompany) {
            if (isset($this->type)) {
                return $this->company->getCompanyProfession();
            } else {
                return $this->getCompanyProfession();
            }
        } else {
            return $this->getUserProfession();
        }
    }

    public function getCompanyUserCompany() {
        return $this->hasOne(UserCompany::className(), ['user_id' => 'id']);
    }

    public function getUserUserCompany() {
        return $this->hasOne(UserCompany::className(), ['company_id' => 'id']);
    }

    // FIXME: Сделать через связующую таблицу
    public static function getProfile() {
        $model = \Yii::$app->user->identity;
        return $model->isCompany ? Company::findOne($model->objId) : User::findOne($model->objId);
    }

    public function saveUserHit() {
        $model = new UserHistory();
        if (\Yii::$app->user->id !== null) {
            $mObj = \Yii::$app->user->identity;
            $model->from_id = $mObj->objId;
            $model->from_type = $mObj->objType;
        } else {
            $model->from_id = 0;
            $model->from_type = 0;
        }
        $model->to_id = $this->objId;
        $model->to_type = $this->objType;
        $model->type = UserHistory::TYPE_HITS;
        $model->description = "1";
        $model->save();
    }

    public function saveUserMarks($marks) {
        $mObj = \Yii::$app->user->identity;
        $model = new UserHistory();

        $model->to_id = $this->objId;
        $model->to_type = $this->objType;
        $model->from_id = $mObj->objId;
        $model->from_type = $mObj->objType;
        $model->description = $marks;
        $model->type = UserHistory::TYPE_MARKS;
        $model->save();
    }

    public function getObj() {
        return $this;
    }

    public function getObjType() {
        return $this->isCompany ? self::TYPE_USER_COMPANY : self::TYPE_USER_USER;
    }

    public function getObjModel() {
        return $this->isCompany ? Company::className() : User::className();
    }

    public function getObjId() {
        return (isset($this->type) && $this->isCompany) ?
                $this->companyUserCompany->company_id :
                $this->id;
    }

    public function getObjImage() {
        return isset($this->type) && $this->isCompany ? isset($this->company->image) ? $this->company->image : "" : $this->image;
    }

    public function getObjUserCompany() {
        return $this->isCompany ? $this->getUserUserCompany() : $this->getCompanyUserCompany();
    }

}
