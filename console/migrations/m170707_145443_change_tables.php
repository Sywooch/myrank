<?php

use yii\db\Migration;

class m170707_145443_change_tables extends Migration {

    public function safeUp() {
        $this->addColumn("{{marks}}", "name_en", $this->string(255)->notNull()->defaultValue("")->after("name"));
        $this->addColumn("{{marks}}", "name_ua", $this->string(255)->notNull()->defaultValue("")->after("name_en"));
    }

    public function safeDown() {
        $this->dropColumn("{{marks}}", "name_en");
        $this->dropColumn("{{marks}}", "name_ua");
    }

}
