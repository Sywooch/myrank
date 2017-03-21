<?php

use yii\db\Migration;

class m170320_003437_add_table_company extends Migration {

    public function up() {
	$this->createTable("{{company}}", [
	    'id' => $this->bigPrimaryKey(),
	    ''
	]);
    }

    public function down() {
	$this->dropTable("{{company}}");
    }

}
