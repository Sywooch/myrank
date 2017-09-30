<?php

use yii\db\Migration;

class m170725_143934_add_column_user_trustees extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_trustees}}", "seen", $this->integer(2)->notNull()->defaultValue(0)->after("type_to"));
        $this->addColumn("{{user_marks}}", "seen", $this->integer(2)->notNull()->defaultValue(0)->after("who_from_to"));
        $this->addColumn("{{testimonials}}", "seen", $this->integer(2)->notNull()->defaultValue(0)->after("who_from_to"));
    }

    public function safeDown() {
        $this->dropColumn("{{user_trustees}}", "seen");
    }

}
