<?php

use yii\db\Migration;

class m170322_230839_add_status_column extends Migration {

    public function up() {
	$this->addColumn("{{testimonials}}", "status", $this->integer(2)->notNull()
		->defaultValue(0)
		->after("text")
		->comment("Статус отзыва"));
    }

    public function down() {
	$this->dropColumn("{{testimonials}}", "status");
    }

}
