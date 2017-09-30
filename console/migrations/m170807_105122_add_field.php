<?php

use yii\db\Migration;

class m170807_105122_add_field extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_trustees}}", "status", $this->integer(2)->notNull()->defaultValue(0));
    }

    public function safeDown() {
        $this->dropColumn("{{user_trustees}}", "status");
    }

}
