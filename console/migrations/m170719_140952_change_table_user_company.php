<?php

use yii\db\Migration;

class m170719_140952_change_table_user_company extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_company}}", "admin", $this->integer(2)->notNull()->defaultValue(0)->after('status'));
    }

    public function safeDown() {
        $this->dropColumn("{{user_company}}", "admin");
    }

}
