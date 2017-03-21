<?php

use yii\db\Migration;

class m170223_181117_add_user_trustees_table extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("user_trustees", [
	    'id' => $this->primaryKey(),
	    'user_to' => $this->bigInteger(20)->notNull()->comment("Кого добавили в доверенные"),
	    'user_from' => $this->bigInteger(20)->notNull()->comment("Кто добавил в доверенные"),
	    'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{user_trustees}}");
    }

}
