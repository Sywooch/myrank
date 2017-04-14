<?php

use yii\db\Migration;

class m170414_080350_add_who_am_i_to extends Migration {

    public function up() {
	$this->addColumn("{{testimonials}}", "who_from_to", $this->integer(1)->notNull()->defaultValue(0)->comment("Кем является коментатор пользователю"));
    }

    public function down() {
	$this->dropColumn("{{testimonials}}", "who_from_to");
    }

}
