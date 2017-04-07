<?php

use yii\db\Migration;

class m170403_173157_add_notification_table extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{user_notification}}", [
	    'id' => $this->primaryKey(),
	    'type' => $this->integer(2)->notNull()->defaultValue(0)->comment("Тип уведомления"),
	    'user_id' => $this->bigInteger(20)->notNull(),
	    'value' => $this->integer(11)->notNull()->notNull()->defaultValue(0),
	    'create' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{user_notification}}");
    }
}
