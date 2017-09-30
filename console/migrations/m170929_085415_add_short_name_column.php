<?php

use yii\db\Migration;

class m170929_085415_add_short_name_column extends Migration {

    public function safeUp() {
        $this->addColumn("{{marks}}", "short_name", $this->string(255)->notNull()->defaultValue(""));
        $this->addColumn("{{marks}}", "short_name_en", $this->string(255)->notNull()->defaultValue(""));
        $this->addColumn("{{marks}}", "short_name_ua", $this->string(255)->notNull()->defaultValue(""));
    }

    public function safeDown() {
        $this->dropColumn("{{marks}}", "short_name");
        $this->dropColumn("{{marks}}", "short_name_en");
        $this->dropColumn("{{marks}}", "short_name_ua");
    }

}
