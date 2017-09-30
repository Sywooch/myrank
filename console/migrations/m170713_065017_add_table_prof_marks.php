<?php

use yii\db\Migration;

class m170713_065017_add_table_prof_marks extends Migration {

    public function safeUp() {
        $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $this->createTable("{{profession_marks}}", [
            'id' => $this->primaryKey(),
            'profession_id' => $this->integer(11)->notNull()->defaultValue(0),
            'mark_id' => $this->integer(11)->notNull()->defaultValue(0),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
        ], $tableOptions);
    }

    public function safeDown() {
        $this->dropTable("{{profession_marks}}");
    }

}
