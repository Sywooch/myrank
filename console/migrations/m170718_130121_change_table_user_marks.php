<?php

use yii\db\Migration;

class m170718_130121_change_table_user_marks extends Migration {

    public function safeUp() {
        $this->addColumn("{{user_marks}}", "who_from_to", $this->integer(2)->notNull()->defaultValue(0)->after("description"));
    }

    public function safeDown() {
        $this->dropColumn("{{user_marks}}", "who_from_to");
    }

}
