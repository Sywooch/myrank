<?php

namespace backend\models;


class User extends \frontend\models\User {
    
    public static function findByEmail($email) {
	return static::findOne(['email' => $email, 'type' => self::TYPE_USER_ADMIN]);
    }
    
    
}
