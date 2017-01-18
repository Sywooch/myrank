<?php

use yii\db\Migration;

class m170117_090006_init_tables_user_block extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	/*
	$this->createTable("{{role_access}}", [
	    'id_role_access'	=> $this->bigPrimaryKey(20),
	    'role_access_name'	=> $this->string(30),
	], $tableOptions);
	
	$this->createTable("{{role_user}}", [
	    'id_role_user'	=> $this->bigPrimaryKey(20),
	    'role_user_name'	=> $this->string(30),
	], $tableOptions);
	*/
	$this->createTable("{{account}}", [
	    'id_account'	=> $this->bigPrimaryKey(20),
	    'role_user_id'	=> $this->bigInteger(20),
	    'role_access_id'	=> $this->bigInteger(20),
	    'account_page'	=> $this->string(255),
	    'account_email'	=> $this->string(50),
	    'account_password_hash' => $this->string(60),
	    'account_password_salt' => $this->string(60),
	    'account_password_reset_code' => $this->string(4),
	    'account_password_reset_code_expires' => $this->dateTime(),
	    'account_user_auth_token' => $this->string(50),
	    'account_auth_key' => $this->string(32),
	    'account_active' => 'tinyint(1) NOT NULL DEFAULT 0',
	    'account_create_date' => $this->timestamp(),
	    'account_status' => $this->smallInteger(6),
	    'account_locale' => $this->string(30),
	    'account_timezone' => $this->integer(3),
	], $tableOptions);
	
	$this->createTable("{{auth}}", [
	    'id_auth' => $this->bigPrimaryKey(),
	    'user_id' => $this->bigInteger(20),
	    'auth_provider' => $this->string(50),
	    'auth_uid' => $this->string(255),
	    'auth_access_token' => $this->text(),
	    'auth_secret' => $this->text(),
	    'auth_created_at' => $this->integer(11),
	    'auth_updated_at' => $this->integer(11),
	    'auth_expires' => $this->integer(12),
	    'auth_refresh_token' => $this->string(255),
	    'auth_link' => $this->string(255),
	    'auth_verifed' => $this->string(10),
	    'auth_photo_url' => $this->string(255)
	], $tableOptions);
	
	$this->createTable("{{user}}", [
	    'id_user' => $this->bigPrimaryKey(20),
	    'account_id' => $this->bigInteger(20),
	    'contact_id' => $this->bigInteger(20),
	    'company_id' => $this->bigInteger(20),
	    'profileviews' => $this->bigInteger(20),
	    'user_profile_company' => $this->string(40),
	    'user_image' => $this->string(255),
	    'user_first_name' => $this->string(50),
	    'user_last_name' => $this->string(50),
	    'user_about' => $this->string(50),
	    'user_last_login' => $this->dateTime(),
	    'user_rating' => $this->integer(11),
	    'user_birthdate' => $this->date(),
	    'user_gender' => $this->string(40),
	], $tableOptions);
	
	$this->createTable("{{access_category_rating}}", [
	    'id_access_category_rating' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'category_id' => $this->bigInteger(20),
	    'access_category_rating_value' => 'tinyint(1) NOT NULL DEFAULT 0',
	], $tableOptions);
	
	$this->createTable("{{access_category_view}}", [
	    'id_access_category_view' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'category_id' => $this->bigInteger(20),
	    'access_category_view_value' => 'tinyint(1) NOT NULL DEFAULT 0',
	], $tableOptions);

	$this->createTable("{{profile_views}}", [
	    'id_profile_views' => $this->bigPrimaryKey(20),
	    'profile_views_lastweek' => $this->bigInteger(20),
	    'profile_views_lastmonth' => $this->bigInteger(20),
	], $tableOptions);

	$this->createTable("{{profession}}", [
	    'id_profession' => $this->bigPrimaryKey(20),
	    'profession_title' => $this->string(255),
	], $tableOptions);

	$this->createTable("{{user_event}}", [
	    'id_user_event' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'user_event_name' => $this->string(255),
	    'user_event_datetime' => $this->dateTime(),
	], $tableOptions);

	$this->createTable("{{user_profession}}", [
	    'id_user_profession' => $this->bigPrimaryKey(20),
	    'user_id' => $this->bigInteger(20),
	    'profession_id' => $this->bigInteger(20),
	], $tableOptions);

	$this->createTable("{{contact}}", [
	    'id_contact' => $this->bigPrimaryKey(20),
	    'city_id' => $this->bigInteger(20),
	    'contact_phone' => $this->string(20),
	    'contact_site' => $this->string(255),
	], $tableOptions);
/*
	$this->createTable("{{user_relation}}", [
	    'id_user_relation' => $this->bigPrimaryKey(20),
	    'user_relation_name' => $this->string(255),
	], $tableOptions);

	$this->createTable("{{country}}", [
	    'id_country' => $this->primaryKey(10),
	    'country_name' => $this->string(52),
	    'country_language' => $this->string(30),
	], $tableOptions);

	$this->createTable("{{city}}", [
	    'id_city' => $this->bigPrimaryKey(20),
	    'country_id' => $this->integer(10),
	    'city_name' => $this->string(50),
	], $tableOptions);
 * 
 */
    }

    public function down() {
	//$this->dropTable("{{role_access}}");
	//$this->dropTable("{{role_user}}");
	$this->dropTable("{{account}}");
	$this->dropTable("{{auth}}");
	$this->dropTable("{{user}}");
	$this->dropTable("{{access_category_rating}}");
	$this->dropTable("{{access_category_view}}");
	$this->dropTable("{{profile_views}}");
	$this->dropTable("{{profession}}");
	$this->dropTable("{{user_profession}}");
	$this->dropTable("{{user_event}}");
	$this->dropTable("{{contact}}");
	//$this->dropTable("{{user_relation}}");
	//$this->dropTable("{{country}}");
	//$this->dropTable("{{city}}");
    }
}
