<?php

use yii\db\Migration;

class m170623_132622_add_field_rating_company extends Migration {

    public function safeUp() {
        $this->addColumn("{{company}}", "rating", $this->integer(11)->notNull()->defaultValue(0));
    }

    public function safeDown() {
        $this->dropColumn("{{company}}", "rating");
    }

}
