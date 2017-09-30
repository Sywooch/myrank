<?php

use yii\db\Migration;

class m170117_090006_init_tables_user_block extends Migration {

    public function up() {
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
	
	$this->createTable("{{auth}}", [
	    'id' => $this->bigPrimaryKey(),
	    'user_id' => $this->bigInteger(20),
	    'provider' => $this->string(50),
	    'uid' => $this->string(255),
	    'access_token' => $this->text(),
	    'secret' => $this->text(),
	    'created_at' => $this->integer(11),
	    'updated_at' => $this->integer(11),
	    'expires' => $this->integer(12),
	    'refresh_token' => $this->string(255),
	    'link' => $this->string(255),
	    'verifed' => $this->string(10),
	    'photo_url' => $this->string(255)
	], $tableOptions);
	
	$this->createTable("{{user}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'account_id' => $this->bigInteger(20),
	    'company_id' => $this->bigInteger(20)->defaultValue(0),
	    'profileviews' => $this->bigInteger(20)->defaultValue(0),
	    'type' => $this->smallInteger(1)->defaultValue(0)->comment("Type user (user/company)"),
	    'image' => $this->string(255),
	    'first_name' => $this->string(50),
	    'last_name' => $this->string(50),
	    'about' => $this->string(50),
	    'last_login' => $this->dateTime(),
	    'rating' => $this->integer(11),
	    'birthdate' => $this->date(),
	    'gender' => 'tinyint(1) NOT NULL DEFAULT 0',
	    'city_id' => $this->bigInteger(20),
	    'phone' => $this->string(20)->comment("Сохранение телефонов в формате json"),
	    'site' => $this->string(255),
            'legal' => $this->integer(2)->notNull()->defaultValue(0)->comment("Согласие с пользовательским соглашением"),
	], $tableOptions);
	
	$this->createTable("{{access_category_rating}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'category_id' => $this->bigInteger(20),
	    'value' => 'tinyint(1) NOT NULL DEFAULT 0',
	], $tableOptions);
	
	$this->createTable("{{access_category_view}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'category_id' => $this->bigInteger(20),
	    'value' => 'tinyint(1) NOT NULL DEFAULT 0',
	], $tableOptions);

	$this->createTable("{{profile_views}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'lastweek' => $this->bigInteger(20),
	    'lastmonth' => $this->bigInteger(20),
	], $tableOptions);

	$this->createTable("{{profession}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'title' => $this->string(255),
	], $tableOptions);

	$this->createTable("{{user_event}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'name' => $this->string(255),
	    'datetime' => $this->dateTime(),
	], $tableOptions);

	$this->createTable("{{user_profession}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'profession_id' => $this->bigInteger(20),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{account}}");
	$this->dropTable("{{auth}}");
	$this->dropTable("{{user}}");
	$this->dropTable("{{access_category_rating}}");
	$this->dropTable("{{access_category_view}}");
	$this->dropTable("{{profile_views}}");
	$this->dropTable("{{profession}}");
	$this->dropTable("{{user_profession}}");
	$this->dropTable("{{user_event}}");
    }
}
