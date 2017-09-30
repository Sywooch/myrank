<?php

use yii\db\Migration;

class m170707_145443_change_tables extends Migration {

    public function safeUp() {
        $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $this->addColumn("{{marks}}", "name_en", $this->string(255)->notNull()->defaultValue("")->after("name"));
        $this->addColumn("{{marks}}", "name_ua", $this->string(255)->notNull()->defaultValue("")->after("name_en"));
        $this->addColumn("{{marks}}", "configure", $this->integer(2)->notNull()->defaultValue(0)->after("name_ua"));
        
        $this->createTable("{{user_marks_custom}}", [
            'id' => $this->bigPrimaryKey(20),
            'user_id' => $this->bigInteger(20),
            'user_type' => $this->integer(2)->notNull()->defaultValue(0),
            'parent_id' => $this->integer(11)->notNull()->defaultValue(0),
            'mark_id' => $this->integer(11)->notNull()->defaultValue(0),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
        ], $tableOptions);
    }

    public function safeDown() {
        $this->dropColumn("{{marks}}", "name_en");
        $this->dropColumn("{{marks}}", "name_ua");
        
        $this->dropTable("{{user_marks_custom}}");
    }

}
