<?php

use yii\db\Migration;

class m170228_085529_add_table_auth extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->dropTable("{{auth}}");
	$this->createTable('auth', [
	    'id' => $this->primaryKey(),
	    'user_id' => $this->integer()->notNull(),
	    'source' => $this->string()->notNull(),
	    'source_id' => $this->string()->notNull(),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{auth}}");
    }

}
