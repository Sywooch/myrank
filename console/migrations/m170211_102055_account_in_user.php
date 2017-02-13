<?php

use yii\db\Migration;

class m170211_102055_account_in_user extends Migration {

    public function up() {
	$this->addColumn("{{user}}", "email", $this->string(255)->after("last_name"));
	$this->addColumn("{{user}}", "auth_key", $this->string(255)->after("email"));
	$this->addColumn("{{user}}", "password_hash", $this->string(255)->after("auth_key"));
	$this->addColumn("{{user}}", "password_reset_token", $this->string(255)->after("password_hash"));
	
	$this->dropTable("{{account}}");
    }

    public function down() {
	$this->dropColumn("{{user}}", "auth_key");
	$this->dropColumn("{{user}}", "password_hash");
	$this->dropColumn("{{user}}", "password_reset_token");
	
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	
	$this->createTable("{{account}}", [
	    'id'	=> $this->bigPrimaryKey(20),
	    'role_user_id'	=> $this->bigInteger(20),
	    'role_access_id'	=> $this->bigInteger(20),
	    'page'	=> $this->string(255),
	    'email'	=> $this->string(50),
	    'password_hash' => $this->string(60),
	    'password_reset_code' => $this->string(4),
	    'password_reset_code_expires' => $this->dateTime(),
	    'user_auth_token' => $this->string(50),
	    'auth_key' => $this->string(32),
	    'active' => 'tinyint(1) NOT NULL DEFAULT 0',
	    'create_date' => $this->timestamp(),
	    'status' => $this->smallInteger(6),
	    'locale' => $this->string(30),
	    'timezone' => $this->integer(3),
	], $tableOptions);
    }

}
