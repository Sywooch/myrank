<?php

use yii\db\Migration;

class m170621_125537_add_marks_config_at_company extends Migration {

    public function safeUp() {
        $this->addColumn("{{company}}", "marks_config", $this->text()->notNull()->defaultValue(""));
    }

    public function safeDown() {
        $this->dropColumn("{{company}}", "marks_config");
    }

}
