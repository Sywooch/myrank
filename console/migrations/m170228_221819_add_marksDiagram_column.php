<?php

use yii\db\Migration;

class m170228_221819_add_marksDiagram_column extends Migration {

    public function up() {
	$this->addColumn("{{user}}", "marks_config", $this->text()->comment("Хранение конфигурации диаграммы"));
    }

    public function down() {
	$this->dropColumn("{{user}}", "marks_config");
    }

}
