<?php

namespace frontend\models;

/**
 *
 * @author Shilo Dmitry
 * @email dmitrywp@gmail.com
 * 
 */
use yii\base\Model;

class HelpForm extends Model {
    
    public $name;
    public $problem;
    public $email;
    public $otherMail;
    public $problemTypeVal;
    public $question;
    
    public function problemType () {
        return [
            0 => \Yii::t('app', 'PROBLEM_NONE'),
            1 => \Yii::t('app', 'PROBLEM_1'),
            2 => \Yii::t('app', 'PROBLEM_2'),
            3 => \Yii::t('app', 'PROBLEM_3'),
            4 => \Yii::t('app', 'PROBLEM_4'),
            5 => \Yii::t('app', 'PROBLEM_5'),
            6 => \Yii::t('app', 'PROBLEM_6'),
            7 => \Yii::t('app', 'PROBLEM_7'),
            8 => \Yii::t('app', 'PROBLEM_8'),
            9 => \Yii::t('app', 'PROBLEM_9'),
        ];
    }
    
    public function rules() {
        return [
            [['name', 'email'], 'required'],
            [['problemTypeVal', 'question', 'problem'], 'safe'],
            [['email'], 'email']
        ];
    }
    
    public function attributeLabels() {
        return [
            'name' => \Yii::t('app', 'NAME'),
            'problem' => \Yii::t('app', 'PROBLEM'),
            'email' => \Yii::t('app', 'EMAIL'),
            'otherMail' => \Yii::t('app', 'OTHER_EMAIL'),
            'problemTypeVal' => \Yii::t('app', 'PROBLEM_TYPE_VAL'),
            'question' => \Yii::t('app', 'QUESTION'),
        ];
    }
    
    public function getProblemTypeName () {
        $arr = $this->problemType();
        return $arr[$this->problemTypeVal];
    }
    
    
    public function sendEmail($email) {
        $body = implode("<br/>", [$this->name, $this->email, $this->problem, $this->problemTypeName, $this->question]);
        return \Yii::$app->mailer->compose()
                        ->setTo($email)
                        ->setFrom([$this->email => $this->name])
                        ->setSubject("Страница помощи")
                        ->setTextBody($body)
                        ->send();
    }
    
}
