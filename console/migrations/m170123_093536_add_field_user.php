<?php

use yii\db\Migration;

class m170123_093536_add_field_user extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	
	$this->addColumn("{{user}}", "way", $this->text()->comment("Направления json"));
	
	$this->createTable("{{images}}", [
	    'id' => $this->primaryKey(),
	    'name' => $this->string(255),
	], $tableOptions);
    }

    public function down() {
	$this->dropColumn("{{user}}", "way");
	$this->dropTable("{{images}}");
    }

}
