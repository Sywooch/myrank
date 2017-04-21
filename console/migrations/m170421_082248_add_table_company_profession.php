<?php

use yii\db\Migration;

class m170421_082248_add_table_company_profession extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{company_profession}}", [
	    'id' => $this->primaryKey(),
	    'company_id' => $this->integer(11)->notNull()->defaultValue(0),
	    'profession_id' => $this->integer(11)->notNull()->defaultValue(0),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{company_profession}}"); 
    }
}
