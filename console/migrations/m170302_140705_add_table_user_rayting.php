<?php

use yii\db\Migration;

class m170302_140705_add_table_user_rayting extends Migration {

    public function up() {
	$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	$this->createTable("{{user_mark_rating}}", [
	    'id' => $this->bigPrimaryKey(20),
	    'user_from' => $this->bigInteger(20),
	    'user_to' => $this->bigInteger(),
	    'mark_id' => $this->integer(),
	    'mark_val' => $this->double(),
	], $tableOptions);
    }

    public function down() {
	$this->dropTable("{{user_mark_rating}}");
    }

}
