<?php

use yii\db\Migration;

class m170715_233905_add_field_marks extends Migration {

    public function safeUp() {
        $this->addColumn("{{marks}}", "company_only", $this->integer(2)->notNull()->defaultValue(0)->after("configure"));
    }

    public function safeDown() {
        $this->dropColumn("{{marks}}", "company_only");
    }
}
