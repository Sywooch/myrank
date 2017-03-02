<?php

use yii\db\Migration;

class m170203_085924_add_testimonials extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{testimonials}}", [
	    'id' => $this->primaryKey(),
	    'text' => $this->text()->comment("Отзыв"),
	    'user_from' => $this->bigInteger(20)->comment("Айди юзверя от кого отзыв"),
	    'usert_to' => $this->bigInteger(20)->comment("Айди юзверя кому отзыв"),
	    'smile' => $this->smallInteger(1)->comment("Идентификатор смайла")->defaultValue(1),
	    'parent_id' => $this->bigInteger(20)->comment("Родительский отзыв")->defaultValue(0),
	    'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment("Отметка времени создания")
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{testimonials}}");
    }

}
