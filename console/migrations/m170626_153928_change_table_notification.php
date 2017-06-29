<?php

use yii\db\Migration;

class m170626_153928_change_table_notification extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_notification}}", "user_type", $this->integer(2)->notNull()->defaultValue(0)->after("user_id"));
    }

    public function safeDown() {
        $this->dropColumn("{{user_notification}}", "user_type");
    }

}
