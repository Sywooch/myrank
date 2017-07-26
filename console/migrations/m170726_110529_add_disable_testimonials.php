<?php

use yii\db\Migration;

class m170726_110529_add_disable_testimonials extends Migration {

    public function safeUp() {
        $this->addColumn("{{company}}", "hide_testimonials", $this->integer(2)->notNull()->defaultValue(0)->after('about'));
        $this->addColumn("{{company}}", "hide_marks", $this->integer(2)->notNull()->defaultValue(0)->after('about'));
    }

    public function safeDown() {
        $this->dropColumn("{{company}}", "hide_testimonials");
        $this->dropColumn("{{company}}", "hide_marks");
    }

}
