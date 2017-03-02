<?php

use yii\db\Migration;

class m170228_121830_add_log_in_bd extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{logs}}", [
	    'id' => $this->primaryKey(),
	    'type' => $this->string(255),
	    'text' => $this->text(),
	    'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{logs}}");
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
