<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;
use yii\helpers\Url;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model {

    public $email;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\frontend\models\User',
                //'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => \Yii::t('app', 'THERE_IS_NO_USER_WITH_SUCH_EMAIL')
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail() {
        /* @var $user User */
        $user = User::findOne(['email' => $this->email]);

        if (!$user) {
            return false;
        }

        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }
/*
        $message = '
        <html>
            <head>
                <title>Востановление пароля</title>
            </head>
            <body>
                <p>Для востановления пароля перейдите по ссылке ниже</p>
                <p><a href="' . Url::toRoute(['site/resetpassword', 'token' => $user->password_reset_token]) . '">' . Url::toRoute(['site/resetpassword', 'token' => $user->password_reset_token]) . '</a></p>
            </body>
        </html>
        ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

// Дополнительные заголовки
        $headers[] = 'To: '.$user->fullName.' <'.$this->email.'>';
        $headers[] = 'From: '.Yii::$app->name.' <'.Yii::$app->params['supportEmail'].'>';

        $out = mail($this->email, \Yii::t('app', 'PASSWORD_RESET_FOR') . ' ' . Yii::$app->name, $message, implode("\r\n", $headers)); */
        

        $out = Yii::$app->mailer
                        ->compose([
                            'html' => 'passwordResetToken-html',
                            'text' => 'passwordResetToken-text'], ['user' => $user]
                        )
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                        ->setTo($this->email)
                        ->setSubject(\Yii::t('app', 'PASSWORD_RESET_FOR') . ' ' . Yii::$app->name)
                        ->send();
        Logs::saveLog($out);
        return $out;
    }

}
