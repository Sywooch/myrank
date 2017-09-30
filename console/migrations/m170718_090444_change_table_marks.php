<?php

use yii\db\Migration;

class m170718_090444_change_table_marks extends Migration {

    public function safeUp() {
        $this->addColumn("{{marks}}", "prof_only", $this->integer(2)->notNull()->defaultValue(0)->after("configure"));
        $this->dropColumn("{{marks}}", "company_only");
    }

    public function safeDown() {
        $this->addColumn("{{marks}}", "company_only", $this->integer(2)->notNull()->defaultValue(0)->after("configure"));
        $this->dropColumn("{{marks}}", "prof_only");
    }

}
