<?php

use yii\db\Migration;

class m170710_195853_change_table_testimonials extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_claim}}", "user_type", $this->integer(2)->notNull()->defaultValue(99)->after('user_id'));
    }

    public function safeDown() {
        $this->dropColumn("{{user_claim}}", "user_type");
    }

}
