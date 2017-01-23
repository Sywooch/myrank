<?php

use yii\db\Migration;
use app\models\User;

class m170120_183233_add_test_user extends Migration {

    public function up() {
	$this->insert("{{user}}", [
	    'account_id' => 1,
	    'company_id' => 0,
	    'first_name' => "Dmitry",
	    'last_name' => "Shilo",
	    'about' => 'aboltus',
	]);
	
	$this->insert("{{account}}", [
	    'role_user_id' => 10,//User::ROLE_USER_TYPE_ADMIN,
	    'role_access_id' => 0,//User::ROLE_ACCESS_TYPE_STANDART,
	    'email' => 'dmitrypw@gmail.com',
	    'status' => 1
	]);
    }

    public function down() {
	User::deleteAll(['id' => 1]);
	app\models\Account::deleteAll(['id' => 1]);
    }

}
