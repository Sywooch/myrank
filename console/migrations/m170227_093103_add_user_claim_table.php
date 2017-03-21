<?php

use yii\db\Migration;

class m170227_093103_add_user_claim_table extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{user_claim}}", [
	    'id' => $this->primaryKey(),
	    'obj' => $this->string(255)->notNull()->comment("Обьект жалобы"),
	    'obj_id' => $this->bigInteger(20)->notNull()->comment("Айди обьекта"),
	    'user_id' => $this->bigInteger(20)->comment("Юзверь который оставил жалобу"),
	    'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{user_claim}}");
    }

}
