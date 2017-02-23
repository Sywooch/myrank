<?php

use yii\db\Migration;

class m170220_220623_add_column_to extends Migration {

    public function up() {
	$this->addColumn("{{marks}}", "access", $this->integer(2)->defaultValue(0)->comment("Кому показывать"));
	$this->addColumn("{{marks}}", "type", $this->integer(2)->defaultValue(0)->comment("Направления деятельности"));
    }

    public function down() {
	$this->dropColumn("{{marks}}", "access");
	$this->dropColumn("{{marks}}", "type");
    }

}
