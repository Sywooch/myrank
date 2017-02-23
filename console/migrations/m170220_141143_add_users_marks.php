<?php

use yii\db\Migration;

class m170220_141143_add_users_marks extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("user_marks", [
	    'id' => $this->primaryKey(),
	    'user_to' => $this->bigInteger(20)->comment("Кому оставили оценку"),
	    'user_from' => $this->bigInteger(20)->comment("Кто оставил оценку"),
	    'description' => $this->text()->comment("Сохранение оценки"),
	    'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{user_marks}}");
    }

}
