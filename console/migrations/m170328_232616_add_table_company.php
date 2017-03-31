<?php

use yii\db\Migration;

class m170328_232616_add_table_company extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{company}}", [
	    'id' => $this->bigPrimaryKey(),
	    'name' => $this->string(255)->notNull()->defaultValue("")->comment("Название компании"),
	    'phone' => $this->string(255)->notNull()->defaultValue("")->comment("Телефон компании"),
	    'count_persons' => $this->integer(2)->notNull()->defaultValue(0)->comment("Количество сотрудников"),
	    'reg_date' => $this->date()->comment("Дата регистрации"),
	    'cash' => $this->integer(2)->notNull()->defaultValue(0)->comment("Ежегодный оборот компании"),
	    'director' => $this->string(255)->notNull()->defaultValue("")->comment("Фио директора"),
	    'contact_face' => $this->string(255)->notNull()->defaultValue("")->comment("Контактное лицо"),
	    'about' => $this->text()->notNull()->comment("Информация о компании"),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{company}}");
    }

}
