<?php

use yii\db\Migration;

class m170123_093536_add_field_user extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	
	$this->addColumn("{{user}}", "way", $this->text()->comment("Направления json"));
	$this->addColumn("{{user}}", "mark", $this->text()->comment("Поле сохранения json оценок"));
	
	$this->createTable("{{images}}", [
	    'id' => $this->primaryKey(),
	    'name' => $this->string(255),
	], $tableOptions);
	
	$this->createTable("{{marks}}", [
	    'id' => $this->primaryKey(),
	    'name' => $this->string(255),
	    'parent_id' => $this->integer(11),
	], $tableOptions);
    }

    public function down() {
	$this->dropColumn("{{user}}", "way");
	$this->dropColumn("{{user}}", "mark");
	$this->dropTable("{{images}}");
	$this->dropTable("{{marks}}");
    }

}
