<?php

/**
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property integer $conut_persons
 * @property string $reg_date
 * @property integer $cash
 * @property integer $city_id
 * @property string $director
 * @property string $contact_face
 * @property string $about
 */
class Company extends UserConstant {

    public $country_id;
    public $professionField;

    const COUNT_PERSONS_SMALL = 1;
    const COUNT_PERSONS_MEDIUM = 2;
    const COUNT_PERSONS_BIG = 3;
    const CASH_SMALL = 1;
    const CASH_MEDIUM = 2;
    const CASH_BIG = 3;

    public $countPersonsList = [
        self::COUNT_PERSONS_SMALL => "100 - 500",
        self::COUNT_PERSONS_MEDIUM => "100 - 1000",
        self::COUNT_PERSONS_BIG => "100 - 1500",
    ];
    public $cashList = [
        self::CASH_SMALL => "1 000 000 руб - 5 000 000 руб",
        self::CASH_MEDIUM => "1 000 000 руб - 10 000 000 руб",
        self::CASH_BIG => "1 000 000 руб - 15 000 000 руб",
    ];
    public $user_id;
    
    //public $rating;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'reg_date'], 'required'],
            [['professionField'], 'required', 'on' => 'editmaininfo'],
            [['count_persons', 'cash'], 'integer'],
            [['reg_date', 'user_id', 'city_id', 'professionField', 'image', 'marks_config', 'mark', 'rating'], 'safe'],
            [['about'], 'string'],
            [['phone', 'director', 'contact_face'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'COMPANY_NAME'),
            'phone' => Yii::t('app', 'COMPANY_PHONE'),
            'count_persons' => Yii::t('app', 'PERSONS_QUANTITY'),
            'reg_date' => Yii::t('app', 'COMPANY_DATA_REGISTRATION'),
            'cash' => Yii::t('app', 'COMPANY_ANNUAL_TURNOVER'),
            'director' => Yii::t('app', 'DIRECTOR_FULLNAME'),
            'contact_face' => Yii::t('app', 'CONTACT_PERSON'),
            'about' => Yii::t('app', 'COMPANY_ABOUT '),
        ];
    }

    public function getCity() {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    public function getCountryCity() {
        return isset($this->city->country_id) ? $this->city->country_id : 0;
    }

    public function getFullName() {
        return $this->name;
    }

    public function saveProfession() {
        if (isset($this->professionField) && (count($this->professionField) > 0)) {
            CompanyProfession::deleteAll(['company_id' => $this->id]);
            foreach ($this->professionField as $item) {
                $mProf = new CompanyProfession();
                $mProf->attributes = [
                    'company_id' => $this->id,
                    'profession_id' => $item,
                ];
                $mProf->save();
            }
        }
    }

    public function getCityName() {
        return ($this->city_id == 0) ? FALSE : $this->getCity()->one()->name;
    }

    public function getCountryName() {
        return ($this->city_id == 0) ? FALSE : $this->getCity()->one()->countryName;
    }

    public function getPosition() {
        return $this->getCityName() && $this->getCountryName() ? $this->getCityName() . ", " . $this->getCountryName() : \Yii::t('app', 'NOT_LISTED');
    }

    public function getProfession() {
        return $this->hasMany(CompanyProfession::className(), ['company_id' => 'id']);
    }

    public function getCompanyProfession() {
        return $this->hasMany(Profession::className(), ['id' => 'profession_id'])->via("profession");
    }

    public function beforeSave($insert) {
        isset($this->id) ? $this->saveProfession() : NULL;
        return parent::beforeSave($insert);
    }
    
    public function getIsCompany () {
        return true;
    }

}
