<?php

use yii\db\Migration;

class m170420_193020_add_field_in_marks extends Migration {

    public function up() {
	$this->addColumn("{{marks}}", "required", $this->integer(1)->notNull()->defaultValue(0)->comment("Обязательное поле"));
    }

    public function down() {
	$this->dropColumn("{{marks}}", "required");
    }

}
