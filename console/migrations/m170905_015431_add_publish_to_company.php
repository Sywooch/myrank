<?php

use yii\db\Migration;

class m170905_015431_add_publish_to_company extends Migration {

    public function safeUp() {
        $this->addColumn("{{company}}", "publish", $this->integer(2)->notNull()->defaultValue(1));
    }

    public function safeDown() {
        $this->dropColumn("{{company}}", "publish");
    }

}
