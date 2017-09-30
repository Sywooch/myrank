<?php

use yii\db\Migration;

class m170821_130106_add_company_struct_table extends Migration {

    public function safeUp() {
        $this->createTable("{{company_struct}}", [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull()->defaultValue(0),
            'company_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'sort' => $this->integer(11)->notNull()->defaultValue(0),
            'created' => $this->timestamp()->defaultExpression("CURRENT_TIMESTAMP"),
        ]);
    }

    public function safeDown() {
        $this->dropTable("{{company_struct}}");
    }

}
