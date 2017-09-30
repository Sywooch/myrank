<?php

use yii\db\Migration;

class m170929_234507_add_column_main_prof extends Migration {

    public function safeUp() {
        $this->addColumn("{{company}}", "main_prof", $this->integer(2)->notNull()->defaultValue(0)->after('marks_config'));
    }

    public function safeDown() {
        $this->dropColumn("{{company}}", "main_prof");
    }

}
