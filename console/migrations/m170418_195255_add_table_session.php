<?php

use yii\db\Migration;

class m170418_195255_add_table_session extends Migration {

    public function up() {
	$this->execute("CREATE TABLE session
	  (
	  id CHAR(40) NOT NULL PRIMARY KEY,
	  expire INTEGER,
	  data BLOB
	  )");
    }

    public function down() {
	$this->dropTable("{{session}}");
    }

}
