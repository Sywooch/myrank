<?php

use yii\db\Migration;

class m170721_223851_change_table_professions extends Migration {

    public function safeUp() {
        $this->addColumn("{{profession}}", "hide_main_page", $this->integer(2)->notNull()->defaultValue(0));
    }

    public function safeDown() {
        $this->dropColumn("{{profession}}", "hide_main_page");
    }

}
